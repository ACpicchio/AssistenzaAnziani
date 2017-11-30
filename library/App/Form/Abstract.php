<?php
class App_Form_Abstract extends Zend_Form
{
	public $elementDecorators = array(
        'ViewHelper',
        array(array('alias1' => 'HtmlTag'),array('tag' => 'td', 'class' => 'input-field col pull-l4 form' )),
		array(array('alias2' => 'HtmlTag'), array('tag' => 'td', 'class' => 'errors','openOnly' => true, 'placement' => 'append')),
		'Errors',
		array(array('alias3' => 'HtmlTag'), array('tag' => 'td', 'closeOnly' => true, 'placement' => 'append')),
        array('Label', array('tag' => 'td', 'class'=> 'col s4 pull-l5')),
        array(array('alias4' => 'HtmlTag'), array('tag' => 'tr')),
        );

    public $elementDecoratorsReg = array(
        'ViewHelper',
        array(array('alias1' => 'HtmlTag'),array('tag' => 'td', 'class' => 'input-field col s6 pull-l6 form' )),
        array(array('alias2' => 'HtmlTag'), array('tag' => 'td', 'class' => 'errors','openOnly' => true, 'placement' => 'append')),
        'Errors',
        array(array('alias3' => 'HtmlTag'), array('tag' => 'td', 'closeOnly' => true, 'placement' => 'append')),
        array('Label', array('tag' => 'td', 'class'=> 'col s4 pull-l5')),
        array(array('alias4' => 'HtmlTag'), array('tag' => 'tr')),
    );

	public $buttonDecorators = array(
        'ViewHelper',
        array(array('alias1' => 'HtmlTag'), array('tag' => 'td', 'class' => 'btn orange waves-effect waves-light col push-l6 btn-form')),
        array(array('alias2' => 'HtmlTag'), array('tag' => 'tr')),
    	);

    public $buttonDecoratorsReg = array(
        'ViewHelper',
        array(array('alias1' => 'HtmlTag'), array('tag' => 'td', 'class' => 'btn orange waves-effect waves-light btn-form')),
        array(array('alias2' => 'HtmlTag'), array('tag' => 'tr')),
    );

	public $radioDecorators = array(
		 'ViewHelper',
        array(array('alias1' => 'HtmlTag'),array('tag' => 'td', 'class' => 'col s6')),
		array(array('alias2' => 'HtmlTag'), array('tag' => 'td', 'class' => 'errors','openOnly' => true, 'placement' => 'append')),
		'Errors',
		array(array('alias3' => 'HtmlTag'), array('tag' => 'td', 'closeOnly' => true, 'placement' => 'append')),
        array('Label', array('tag' => 'td', 'class' => 'col s6 pull-l5')),
        array(array('alias4' => 'HtmlTag'), array('tag' => 'tr')),
        );

    public $textareaDecorators = array(
        'ViewHelper',
        array(array('alias1' => 'HtmlTag'),array('tag' => 'td', 'class' => 'materialize-textarea col s6')),
        array(array('alias2' => 'HtmlTag'), array('tag' => 'td', 'class' => 'errors','openOnly' => true, 'placement' => 'append')),
        'Errors',
        array(array('alias3' => 'HtmlTag'), array('tag' => 'td', 'closeOnly' => true, 'placement' => 'append')),
        array('Label', array('tag' => 'td', 'class'=> 'col s4 pull-l5')),
        array(array('alias4' => 'HtmlTag'), array('tag' => 'tr')),
    );

    public $fileDecorators = array(
        'File',
        array(array('alias1' => 'HtmlTag'),array('tag' => 'td', 'class' => 'file col s6')),
        array(array('alias2' => 'HtmlTag'), array('tag' => 'td', 'class' => 'errors', 'openOnly' => true, 'placement' => 'append')),
        'Errors',
        array(array('alias3' => 'HtmlTag'), array('tag' => 'td', 'closeOnly' => true, 'placement' => 'append')),
        array('Label', array('tag' => 'td', 'class' => 'col s6 pull-l5')),
        array(array('alias4' => 'HtmlTag'), array('tag' => 'tr')),
    );

    public $radioDecoratorsPr = array(
        'ViewHelper',
        array(array('alias1' => 'HtmlTag'),array('tag' => 'td', 'class' => 'col s12 pull-l12 pull-s12')),
        array(array('alias2' => 'HtmlTag'), array('tag' => 'td', 'class' => 'errors','openOnly' => true, 'placement' => 'append')),
        'Errors',
        array(array('alias3' => 'HtmlTag'), array('tag' => 'td', 'closeOnly' => true, 'placement' => 'append')),
        array('Label', array('tag' => 'td', 'class' => 'col s6')),
        array(array('alias4' => 'HtmlTag'), array('tag' => 'tr')),
    );

    public $buttonDecoratorsPr = array(
        'ViewHelper',
        array(array('alias1' => 'HtmlTag'), array('tag' => 'td', 'class' => 'btn orange waves-effect waves-light col s4 m8 l3 push-l7 ')),
        array(array('alias2' => 'HtmlTag'), array('tag' => 'tr')),

    );

}