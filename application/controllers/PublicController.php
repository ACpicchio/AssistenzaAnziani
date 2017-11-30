<?php

class PublicController extends Zend_Controller_Action
{
    protected $_authService;
    protected $_userModel;

    public function init()
    {
        $this->_helper->layout->setLayout('main');
    }

    public function indexAction()
    {
    }

}