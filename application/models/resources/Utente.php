<?php

class Application_Resource_Utente extends Zend_Db_Table_Abstract
{
    protected $_name = 'utente';
    protected $_primary = 'user_id';
    protected $_rowClass = 'Application_Resource_Utente_Item';

    public function init()
    {
    }

    public function nuovoUtente($info)
    {
        return $this->insert($info);
    }


    public function getUtenteByEmail($email)
    {
        return $this->fetchRow($this->select()->where('email = ?', $email));
    }


    public function getUtenteByTipo($tipo)
    {
        return $this->fetchAll($this->select()->where('professione = ?', $tipo));
    }

    public function getUtenteByCitta($citta)
    {
        return $this->fetchAll($this->select()->where('citta = '. $citta));
    }

    public function getUtenteByRuolo($ruolo){
        return $this->fetchRow($this->select()->where('ruolo = '. $ruolo));
    }

}