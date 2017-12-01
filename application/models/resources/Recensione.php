<?php

class Application_Resource_Recensione extends Zend_Db_Table_Abstract
{
    protected $_name = 'recensione';
    protected $_primary = 'rec_id';
    protected $_rowClass = 'Application_Resource_Recensione_Item';

    public function init()
    {
    }

    public function nuovoUtente($info)
    {
        return $this->insert($info);
    }

    public function recensioni($id){

        return $this->fetchAll($this->select()->where('operatore = ?', $id));

    }
}