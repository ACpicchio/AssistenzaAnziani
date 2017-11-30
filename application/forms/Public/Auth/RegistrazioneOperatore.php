<?php

class Application_Form_Public_Auth_RegistrazioneOperatore extends App_Form_Abstract
{
    public function init()
    {
        $this->setMethod('post');
        $this->setName('registrazioneOperatore');
        $this->setAction('');


        $this->addElement('text', 'nome', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(2, 25))
            ),
            'required'   => true,
            'label'      => 'Nome',
            'decorators' => $this->elementDecoratorsReg,
        ));


        $this->addElement('text', 'cognome', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(2, 25))
            ),
            'required'   => true,
            'label'      => 'Cognome',
            'decorators' => $this->elementDecoratorsReg,
        ));

        $this->addElement('text', 'cf', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(11, 16))
            ),
            'required'   => true,
            'label'      => 'CF o P.Iva',
            'decorators' => $this->elementDecoratorsReg,
        ));

        $this->addElement('text', 'luogonascita', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(2, 50))
            ),
            'required'   => true,
            'label'      => 'Luogo di Nascita',
            'decorators' => $this->elementDecoratorsReg,
        ));


        $this->addElement('select', 'professione', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(2, 25))
            ),
            'required'   => true,
            'label' => 'Professione',
            'options' => array(
                'value_options' => array(
                    '0' => 'Infermiere',
                    '1' => 'Operatore socio sanitario',
                    '2' => 'Fisioterapista',
                ),
            ),
            'decorators' => $this->elementDecoratorsReg,
        ));


        $this->addElement('text', 'ente', array(
        'filters'    => array('StringTrim'),
        'validators' => array(
            array('StringLength', true, array(2, 50))
        ),
        'required'   => true,
        'label'      => 'Ente di rilascio attestato',
        'decorators' => $this->elementDecoratorsReg,
        ));


        $this->addElement('file', 'immagine', array(
            'label' => 'Carica immagine del profilo',
            'destination' => APPLICATION_PATH . '/../public/images/profilo',
            'validators' => array(
                array('Count', false, 1),
                array('Size', false, 102400),
                array('Extension', false, array('jpg', 'gif', 'jpeg'))),
            'decorators' => $this->fileDecorators,
        ));



        $this->addElement('text', 'email', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(3, 100))
            ),
            'required'   => true,
            'label'      => 'Email',
            'decorators' => $this->elementDecoratorsReg,
        ));


        $this->addElement('password', 'password', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(3, 25))
            ),
            'required'   => true,
            'label'      => 'Password',
            'decorators' => $this->elementDecoratorsReg,
        ));


        $this->addElement('submit', 'registrati', array(

            'label'      => 'Registrati',
            'decorators' => $this->buttonDecoratorsReg,
        ));


        $this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag' => 'table', 'class' => 'zend_form centered center-align row col s12"')),
            array('Description', array('placement' => 'prepend', 'class' => 'form-error')),
            'Form'
        ));

    }
}