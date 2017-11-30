<?php

class Application_Form_Public_Auth_Registrazione extends App_Form_Abstract
{
	public function init()
	{
		$this->setMethod('post');
        $this->setName('registrazione');
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


        $this->addElement('text', 'email', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(3, 100))),
            'required'   => true,
            'label'      => 'Email',
            'decorators' => $this->elementDecoratorsReg,
        ));


        $this->addElement('text', 'cf', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, 16)),
            'required'   => true,
            'label'      => 'Codice Fiscale',
            'decorators' => $this->elementDecoratorsReg,
        ));


        $this->addElement('text', 'citta', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(2, 50))
            ),
            'required'   => true,
            'label'      => 'Città',
            'decorators' => $this->elementDecoratorsReg,
        ));


        $this->addElement('text', 'indirizzo', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(2, 100))
            ),
            'required'   => true,
            'label'      => 'Indirizzo',
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
