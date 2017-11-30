<?php

class Application_Resource_Operatore extends Zend_Db_Table_Abstract
{
    protected $_name = 'operatore';
    protected $_primary = 'op_id';
    protected $_rowClass = 'Application_Resource_Operatore_Item';

    public function init()
    {
    }

    public function nuovoOperatore($info)
    {
        return $this->insert($info);
    }


    public function getOperatoreByEmail($user_email)
    {
        return $this->fetchRow($this->select()->where('email = ?', $user_email));
    }


    public function getOperatoreByTipo($tipo)
    {
        return $this->fetchAll($this->select()->where('professione = ?', $tipo));
    }

    public function getOperatoreByCitta($citta)
    {
        return $this->fetchAll($this->select()->where('citta = ?', $citta));
    }
}