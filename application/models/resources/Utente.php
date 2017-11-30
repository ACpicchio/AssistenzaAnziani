<?php

class Application_Resource_Utente extends Zend_Db_Table_Abstract
{
    protected $_name    = 'utente';
    protected $_primary  = 'user_id';
    protected $_rowClass = 'Application_Resource_Utente_Item';

    public function init()
    {
    }


    public function getUserById($user_id)
    {
        return $this->fetchRow($this->select()->where('user_id = ?', $user_id));
    }

    public function nuovoUtente($info)
    {
        return $this->insert($info);
    }

}