<?php

class PublicController extends Zend_Controller_Action
{
    protected $_authService;
    protected $_userModel;
    protected $_operModel;


    public function init()
    {
        $this->_helper->layout->setLayout('main');
        $this -> _authService = new Application_Service_Auth();
        $this->view->loginForm = $this->getLoginForm();
        $this->view->registrazioneForm = $this->getRegistrazioneForm();
        $this->view->registrazioneOperatoreForm = $this->getRegistrazioneOperatoreForm();
        $this->_userModel = new Application_Model_User();
        $this->_operModel = new Application_Model_Oper();
   }

    public function indexAction()
    {
    }

    public function viewstaticAction() {
        $page = $this->_getParam('staticPage');
        $this->render($page);
    }

    public function registrazioneAction()
    {
    }

    public function registrazioneoperatoreAction()
    {
    }

    public function registrazioneeffettuataAction()
    {

    }



    public function registratiutenteAction()
    {
        if (!$this->getRequest()->isPost()) {
            $this->_helper->redirector('index');
        }
        $form=$this->_registrazioneForm;
        if (!$form->isValid($_POST)) {
            $form->setDescription('Attenzione: alcuni dati inseriti sono errati.');
            return $this->render('registrazione');
        }
        else {
            $values = $form->getValues();
            $values['ruolo'] = 'user';
            if ($this->_userModel->emailUsata($values['email'])) {
                $form->setDescription('Attenzione: Email già esistente.');
                return $this->render('registrazione');
            }
            else {

                $nome = $form -> getValue('nome');
                $cognome = $form -> getValue('cognome');
                $password = $form -> getValue('password');
                $indirizzo = $form -> getValue('indirizzo');
                $comune = $form -> getValue('citta');
                $email = $form -> getValue('email');
                $codice_fis = $form -> getValue('partita_iva');


                $data = array('nome'=> $nome, 'cognome'=>$cognome, 'password'=>$password,'indirizzo'=>$indirizzo, 'citta'=>$comune,
                                'email'=>$email, 'partita_iva'=>$codice_fis, 'ruolo'=>'user');
                $this->_userModel->registrazione($data);
                $this->_helper->redirector('registrazioneeffettuata');}

        }
    }

    public function registratioperatoreAction()
    {
        if (!$this->getRequest()->isPost()) {
            $this->_helper->redirector('index');
        }
        $form=$this->_registrazioneOperatoreForm;
        if (!$form->isValid($_POST)) {
            $form->setDescription('Attenzione: alcuni dati inseriti sono errati.');
            return $this->render('registrazioneoperatore');
        }
        else {
            $values = $form->getValues();
            $values['ruolo'] = 'operatore';
            if ($this->_userModel->emailUsata($values['email'])) {        // restituisce vero se esiste già quell'username
                $form->setDescription('Attenzione: Email già esistente.');
                return $this->render('registrazioneoperatore');
            }
            else {

                $nome = $form -> getValue('nome');
                $cognome = $form -> getValue('cognome');
                $password = $form -> getValue('password');
                $email = $form -> getValue('email');
                $codice_fis = $form -> getValue('partita_iva');
                $nascita = $form -> getValue('luogo_nascita');
                $professione = $form->getValue('professione');
                $ente = $form -> getValue('ente');
                $prezzo = $form -> getValue('prezzo');
                $fotoprofilo = $form -> getValue('fotoprofilo');
                $datanascita = $form -> getValue('data_nascita');

                $data = array('nome'=> $nome, 'cognome'=>$cognome, 'password'=>$password, 'email'=>$email, 'partita_iva'=>$codice_fis, 'ruolo'=>'operatore',
                    'luogo_nascita'=>$nascita,'data_nascita'=>$datanascita, 'professione'=>$professione, 'ente'=>$ente, 'prezzo'=>$prezzo, 'fotoprofilo'=>$fotoprofilo);

                $this->_operModel->registrazione($data);
                $this->_helper->redirector('registrazioneeffettuata');}

        }
    }


    public function loginAction(){
    }

    public function authenticateAction(){
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

        return $this -> _helper -> redirector('index', $this -> _authService -> getIdentity() -> ruolo);

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
        $this->_registrazioneForm = new Application_Form_Public_Auth_Registrazione();
        $this->_registrazioneForm->setAction($urlHelper->url(array(
            'controller' => 'public',
            'action' => 'registratiutente'),
            'default'
        ));
        return $this->_registrazioneForm;
    }


    private function getRegistrazioneOperatoreForm()
    {
        $urlHelper = $this->_helper->getHelper('url');
        $this->_registrazioneOperatoreForm = new Application_Form_Public_Auth_RegistrazioneOperatore();
        $this->_registrazioneOperatoreForm->setAction($urlHelper->url(array(
            'controller' => 'public',
            'action' => 'registratioperatore'),
            'default'
        ));
        return $this->_registrazioneOperatoreForm;
    }


    public function operatoriAction()
    {

        $tipo = $this->getParam('tipo', null);
        $operatori = $this->_operModel->getUtenteByTipo($tipo);

        if ($operatori == NULL) {
            $this->view->assign(array(
                   'operatori' => NULL  )
            );
        }
        else {
            $this->view->assign(array(
                    'tipo' => $tipo  )
            );
            $this->view->assign(array(
                    'operatori' => $operatori  )
            );
        }
    }

}
