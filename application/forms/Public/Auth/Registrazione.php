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
           	
       	$this->addElement('radio', 'genere', array(
            'multiOptions' => array('M' => 'M' , 'F' => 'F'),
            'required'   => true,
            'label'      => 'Genere',
            'decorators' => $this->radioDecorators,
            ));
		
		$this->addElement('text', 'eta', array(
            'required'   => true,
            'validators' => array('Int'),
            'label'      => 'Età',
            'decorators' => $this->elementDecoratorsReg,
            ));
			
		$this->addElement('text', 'username', array(
            'filters'    => array('StringTrim', 'StringToLower'),
            'validators' => array(
                array('StringLength', true, array(3, 25))
            ),
            'required'   => true,
            'label'      => 'Username',
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
		
		$this->addElement('text', 'email', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                array('StringLength', true, array(3, 100))
            ),
            'required'   => true,
            'label'      => 'Email',
            'decorators' => $this->elementDecoratorsReg,
            ));

        $this->addElement('textarea', 'descrizione', array(
            'filters'    => array('StringTrim'),
            'label'     => 'Descrizione profilo',
            'validators' => array(
                array('StringLength', true, array(3, 5000))
            ),
            'decorators'=> $this->textareaDecorators,
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
