<?php


class Application_Model_Oper extends App_Model_Abstract
{

    public function __construct()
    {
    }


    public function getOperatoreByEmail($id)
    {
        return $this->getResource('Operatore')->getOperatoreByEmail($id);
    }

    public function registrazione($info)
    {
        return $this->getResource('Operatore')->nuovoOperatore($info);
    }

    public function getOperByTipo($tipo)
    {
        return $this->getResource('Operatore')->getOperatoreByTipo($tipo);
    }

    public function getOperByCitta($citta)
    {
        return $this->getResource('Operatore')->getOperatoreByCitta($citta);
    }


}
