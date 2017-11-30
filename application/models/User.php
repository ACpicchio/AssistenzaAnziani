<?php

class Application_Model_User extends App_Model_Abstract
{

    public function __construct()
    {
    }

    public function getUserById($id)
    {
        return $this->getResource('Utente')->getUserById($id);
    }

    public function getUserByUsername($info)
    {
        return $this->getResource('Utente')->getUserByUsername($info);
    }

    public function registrazione($info)
    {
        return $this->getResource('Utente')->nuovoUtente($info);
    }

    public function usernameUsato($info)
    {
        return $this->getResource('Utente')->usernameUsato($info);
    }


}
