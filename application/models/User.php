<?php

class Application_Model_User extends App_Model_Abstract
{

    public function __construct()
    {
    }

    public function getUserByEmail($id)
    {
        return $this->getResource('Utente')->getUserByEmail($id);
    }

    public function registrazione($info)
    {
        return $this->getResource('Utente')->nuovoUtente($info);
    }


}
