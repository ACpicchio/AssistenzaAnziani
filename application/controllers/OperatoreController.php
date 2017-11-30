<?php

class OperatoreController extends Zend_Controller_Action {

    protected $_authService;
    protected $_operatoreModel;
    #protected $_userModel;


    public function init() {
        $this -> _helper -> layout -> setLayout('operatore');
        $this -> _authService = new Application_Service_Auth();
        $this -> _operatoreModel = new Application_Model_Operatore();
        $this -> _loggato = Zend_Auth::getInstance() -> getIdentity() -> userID;

        #$this -> _userModel = new Application_Model_User();
        $this -> view -> modificaProfiloForm = $this -> getModificaProfiloForm();
    }

    public function indexAction() {
    }


    public function logoutAction() {
        $this -> _authService -> clear();
        return $this -> _helper -> redirector('index', 'public');
    }



    /*  ####################  MODIFICA DEL PROPRIO PROFILO  ####################  */

    public function modificaprofiloAction() {
    }

    private function getModificaProfiloForm() {
        $urlHelper = $this -> _helper -> getHelper('url');
        $this -> _modprofiloform = new Application_Form_Public_Auth_Registrazione();


        $loggato = Zend_Auth::getInstance() -> getIdentity();

        $this -> _modprofiloform -> populate(array('nome' => $loggato -> nome, 'cognome' => $loggato -> cognome, 'username' => $loggato -> username, 'password' => $loggato -> password, 'genere' => $loggato -> genere, 'nascita' => $loggato -> nascita, 'fotoprofilo' => $loggato -> fotoprofilo, 'citta' => $loggato -> citta, 'email' => $loggato -> email, 'telefono' => $loggato -> telefono, 'quote' => $loggato -> quote, 'vis_prof' => $loggato -> vis_prof));

        return $this -> _modprofiloform;
    }

    public function modAction() {
        $request = $this -> getRequest();
        if (!$this -> getRequest() -> isPost()) {
            $this -> _helper -> redirector('index');
        }
        $form = $this -> _modprofiloform;
        if (!$form -> isValid($request -> getPost())) {
            $form -> setDescription('Attenzione: alcuni dati inseriti sono errati.');
            return $this -> render('modificaprofilo');
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
        $password = $form -> getValue('password');
        $genere = $form -> getValue('genere');
        $nascita = $form -> getValue('nascita');
        $fotoprofilo = $form -> getValue('fotoprofilo');
        $comune = $form -> getValue('citta');
        $email = $form -> getValue('email');
        $telefono = $form -> getValue('telefono');
        $citazione = $form -> getValue('quote');
        $vis_prof = $form -> getValue('vis_prof');

        $newdata = array('nome' => $nome, 'cognome' => $cognome, 'username' => $username, 'password' => $password, 'genere' => $genere, 'nascita' => $nascita, 'fotoprofilo' => $fotoprofilo, 'citta' => $comune, 'email' => $email, 'telefono' => $telefono, 'quote' => $citazione, 'vis_prof' => $vis_prof);

        $this -> _operatoreModel -> modifyUser($newdata, $this -> _loggato);

        $new = $this -> _userModel -> getUserByUsername($username);
        $auth = Zend_Auth::getInstance();
        $auth -> getStorage() -> write($new);

        return $this -> _helper -> redirector('index', 'operatore');
    }


}