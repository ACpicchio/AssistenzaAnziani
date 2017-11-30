<?php

class PublicController extends Zend_Controller_Action
{
    protected $_authService;
    protected $_userModel;

    public function init()
    {
        $this->_helper->layout->setLayout('main');
        $this->view->loginForm = $this->getLoginForm();
        $this->view->registrazioneForm = $this->getRegistrazioneForm();
        $this->view->registrazioneOperatoreForm = $this->getRegistrazioneOperatoreForm();


    }

    public function indexAction()
    {
    }

    public function registrazioneAction()
    {
    }

    public function registratiAction()
    {
        if (!$this->getRequest()->isPost()) {
            $this->_helper->redirector('index');
        }
        $form=$this->_registrazioneform;
        if (!$form->isValid($_POST)) {
            $form->setDescription('Attenzione: alcuni dati inseriti sono errati.');
            return $this->render('registrazione');
        }
        else {
            $values = $form->getValues();
            $values['tipo'] = 'user';
            if ($this->_userModel->usernameUsato($values['username'])) {        // restituisce vero se esiste già quell'username
                $form->setDescription('Attenzione: Username non disponibile. Scegline un altro.');
                return $this->render('registrazione');
            }
            else {
                $this->_userModel->registrazione($values);
                $this->_helper->redirector('registrazioneeffettuata');}

        }
    }
    public function registrazioneeffettuataAction()
    {
    }

    public function loginAction()
    {

    }

    private function getLoginForm()
    {
        $urlHelper = $this->_helper->getHelper('url');
        $this->_loginform = new Application_Form_Public_Auth_Login();
        $this->_loginform->setAction($urlHelper->url(array(
            'controller' => 'public',
            'action' => 'authenticate'),
            'default'
        ));
        return $this->_loginform;
    }

    private function getRegistrazioneForm()
    {
        $urlHelper = $this->_helper->getHelper('url');
        $this->_registrazioneform = new Application_Form_Public_Auth_Registrazione();
        $this->_registrazioneform->setAction($urlHelper->url(array(
            'controller' => 'public',
            'action' => 'registrati'),
            'default'
        ));
        return $this->_registrazioneform;
    }


    private function getRegistrazioneOperatoreForm()
    {
        $urlHelper = $this->_helper->getHelper('url');
        $this->_registrazioneform = new Application_Form_Public_Auth_RegistrazioneOperatore();
        $this->_registrazioneform->setAction($urlHelper->url(array(
            'controller' => 'public',
            'action' => 'registrazioneOperatore'),
            'default'
        ));
        return $this->_registrazioneform;
    }

    public function authenticateAction()
    {
        $request = $this->getRequest();
        if (!$request->isPost()) {
            return $this->_helper->redirector('login');
        }
        $form = $this->_loginform;
        if (!$form->isValid($request->getPost())) {
            $form->setDescription('Attenzione: alcuni dati inseriti sono errati.');
            return $this->render('login');
        }
        if (false === $this->_authService->authenticate($form->getValues())) {
            $form->setDescription('Autenticazione fallita. Riprova');
            return $this->render('login');
        }
        return $this->_helper->redirector('index', $this->_authService->getIdentity()->tipo);
    }

    public function viewstaticAction() {
        $page = $this->_getParam('staticPage');
        $this->render($page);
    }

}