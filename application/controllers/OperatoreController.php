<?php

class OperatoreController extends Zend_Controller_Action
{

    protected $_authService;
    protected $_operModel;

    #protected $_userModel;


    public function init()
    {
        $this->_helper->layout->setLayout('operatore');
        $this->_authService = new Application_Service_Auth();
        $this->_operModel = new Application_Model_Oper();
        $this->_loggato = Zend_Auth::getInstance()->getIdentity()->user_id;

        #$this -> _userModel = new Application_Model_User();
        #$this->view->modificaProfiloForm = $this->getModificaProfiloForm();
    }

    public function indexAction()
    {
       $email = Zend_Auth::getInstance()->getIdentity()->email;
       $operatore = $this->_operModel->getUtenteByEmail($email);
        $this->view->assign(array(
                'operatore' => $operatore  )
        );
    }


    public function logoutAction()
    {
        $this->_authService->clear();
        return $this->_helper->redirector('index', 'public');
    }


    /*  ####################  MODIFICA DEL PROPRIO PROFILO  ####################

    public function modificaprofiloAction()
    {
    }

    private function getModificaProfiloForm()
    {
        $urlHelper = $this->_helper->getHelper('url');
        $this->_modprofiloform = new Application_Form_Public_Auth_RegistrazioneOperatore();


        $loggato = Zend_Auth::getInstance()->getIdentityByEmail();

        $this->_modprofiloform->populate(array('nome' => $loggato->nome, 'cognome' => $loggato->cognome, 'username' => $loggato->username, 'password' => $loggato->password, 'prezzo' => $loggato->prezzo, 'immagine' => $loggato->immagine,  'email' => $loggato->email,));

        return $this->_modprofiloform;
    }

    public function modAction()
    {
        $request = $this->getRequest();
        if (!$this->getRequest()->isPost()) {
            $this->_helper->redirector('index');
        }
        $form = $this->_modprofiloform;
        if (!$form->isValid($request->getPost())) {
            $form->setDescription('Attenzione: alcuni dati inseriti sono errati.');
            return $this->render('modificaprofilo');
        }

                $username = $form -> getValue('username');

                if ($username !== Zend_Auth::getInstance() -> getIdentity() -> username) {
                    if ($this -> _userModel -> usernameUsato($username)) {
                        $form -> setDescription('Attenzione: username usato da un altro utente');
                        return $this -> render('modificaprofilo');
                    }
                }

                $nome = $form -> getValue('nome');
                $cognome = $form -> getValue('cognome');
                $email = $form -> getValue('email');
                $prezzo = $form -> getValue('prezzo');
                $password = $form -> getValue('password');
                $fotoprofilo = $form -> getValue('fotoprofilo');

                $newdata = array('nome' => $nome, 'cognome' => $cognome, 'username' => $username, 'email' => $email,'prezzo' => $password, 'prezzo' => $password, 'fotoprofilo' => $fotoprofilo);

                $this -> _operatoreModel -> modifyUser($newdata, $this -> _loggato);

                $new = $this -> _userModel -> getUserByEmail($username);
                $auth = Zend_Auth::getInstance();
                $auth -> getStorage() -> write($new);

                return $this -> _helper -> redirector('index', 'operatore');
            }
    */


    }
