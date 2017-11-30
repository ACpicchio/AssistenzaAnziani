<?php

class Application_Service_Auth
{
    protected $_userModel;
    protected $_operModel;
    protected $_auth;
    protected $role;

    public function __construct()
    {
        $this->_userModel = new Application_Model_User();
        $this->_operModel = new Application_Model_Oper();

    }
    
    public function authenticate($credentials)
    {
        $adapter = $this->getAuthAdapter($credentials);
        $auth    = $this->getAuth();
        $result  = $auth->authenticate($adapter);

        if (!$result->isValid()) {
            return false;
        }
        $user = $this->_userModel->getUserByEmail($credentials['email']);
        $auth->getStorage()->write($user);
        return true;
    }

    public function aggiornaIdentity($email) {
        $auth = $this->getAuth();
        $user = $this->_userModel->getUserByEmail($email);
        if ($user != null) {
            $this->role = 'user';
        }
        else {
            $user = $this->_operModel->getOperatoreByEmail($email);
            $this->role = 'operatore';
        }
        $auth->getStorage()->write($user);
        return true;
    }
    
    public function getAuth()
    {
        if (null === $this->_auth) {
            $this->_auth = Zend_Auth::getInstance();
        }
        return $this->_auth;
    }
   
    public function getIdentity()
    {
        $auth = $this->getAuth();
        if ($auth->hasIdentity()) {
            return $auth->getIdentity();
        }
        return false;
    }
    
    public function clear()
    {
        $this->getAuth()->clearIdentity();
    }
    
    public function getAuthAdapter($values)
    {
		$authAdapter = new Zend_Auth_Adapter_DbTable(
			Zend_Db_Table_Abstract::getDefaultAdapter(),
			'utente',
			'email',
			'password'
		);
		$authAdapter->setIdentity($values['email']);
		$authAdapter->setCredential($values['password']);
        return $authAdapter;
    }

    public function getRole()
    {
        return $this->role;
    }


}
