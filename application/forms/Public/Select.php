<?php

class Application_Form_Public_Select extends App_Form_Abstract {

    public function init() {
        $this -> setMethod('post');
        $this -> setName('select');

        $this -> addElement('select', 'professione', array(
            'filters' => array('StringTrim'),
            'validators' => array( array('StringLength', true, array(1, 51))),
            'placeholder' => 'Cerca persone digitando nome e/o cognome...',
            'size'=>25,
            //'decorators' => $this -> cercaDeco,
        ));


        $this -> addElement('submit', 'Cerca', array(
            'decorators' => $this -> buttonDeco1, ));

        //$this -> setDecorators(array('FormElements', array('HtmlTag', array('tag' => 'table', 'class' => 'zend_form', 'style'=>'margin-top: -20px;')), 'Form'));
    }

}