<?php

class Application_Model_User extends App_Model_Abstract
{

    public function __construct()
    {
    }

    public function getUserByEmail($email)
    {
        return $this->getResource('Utente')->getUtenteByEmail($email);
    }

    public function registrazione($info)
    {
        return $this->getResource('Utente')->nuovoUtente($info);
    }

    public function emailUsata($info)
    {
        return $this->getResource('Utente')->emailUsata($info);
    }

}
