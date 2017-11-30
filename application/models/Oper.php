<?php


class Application_Model_Oper extends App_Model_Abstract
{

    public function __construct()
    {
    }


    public function getUtenteByEmail($email)
    {
        return $this->getResource('Utente')->getUtenteByEmail($email);
    }

    public function registrazione($info)
    {
        return $this->getResource('Utente')->nuovoUtente($info);
    }

    public function getUtenteByTipo($tipo)
    {
        return $this->getResource('Utente')->getUtenteByTipo($tipo);
    }

    public function getUtenteByCitta($citta)
    {
        return $this->getResource('Utente')->getUtenteByCitta($citta);
    }


}
