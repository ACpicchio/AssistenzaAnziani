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
            'decorators' => $this->elementDecorators,
            ));
		
		$this->addElement('text', 'cognome', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(2, 25))
            ),
            'required'   => true,
            'label'      => 'Cognome',
            'decorators' => $this->elementDecorators,
            ));


        $this->addElement('text', 'email', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(3, 50)),
                Zend_Validate_EmailAddress::INVALID => 'EmailAddress'),
            'required'   => true,
            'label'      => 'Email',
            'decorators' => $this->elementDecorators,
        ));


        $this->addElement('text', 'partita_iva', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, 16)),
            'required'   => true,
            'label'      => 'Codice Fiscale',
            'decorators' => $this->elementDecorators,
        ));


        $this->addElement('text', 'citta', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(2, 50))
            ),
            'required'   => true,
            'label'      => 'Città',
            'decorators' => $this->elementDecorators,
        ));


        $this->addElement('text', 'indirizzo', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(2, 100))
            ),
            'required'   => false,
            'label'      => 'Indirizzo',
            'decorators' => $this->elementDecorators,
        ));

		
		
		$this->addElement('password', 'password', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(3, 25))
            ),
            'required'   => true,
            'label'      => 'Password',
            'decorators' => $this->elementDecorators,
            ));

		$this->addElement('password', 'conf_password', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('identical', false, array('token' => 'password'))
            ),
            'required'   => true,
            'label'      => 'Conferma Password',
            'decorators' => $this->elementDecorators,
        ));



		$this->addElement('submit', 'registrazione', array(
            
            'label'      => 'Registrati',
            'decorators' => $this->buttonDecorators,
            ));


		$this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag' => 'table', 'class' => 'zend_form centered center-align row col s12"')),
        		array('Description', array('placement' => 'prepend', 'class' => 'form-error')),
            'Form'
        ));
		
	}
}
