<?php

class Application_Form_agregar extends Zend_Form
{

    public function init()
    {
        $this->setName('agregar');
        $this->setMethod('post');
       // $this->setAction('/index/agregar');
        //$this->setAction('/index/agregar');
      //  $this->setAction(array('controller'=>'index',
        //					   'action'=>'agregar'));
        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');
        $nombre = new Zend_Form_Element_Text('nombre');
        $nombre->setLabel('Nombre')
        	->setAttrib('id', 'nombre')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim');
            
            //->addValidator('NotEmpty');
        $placa = new Zend_Form_Element_Text('placa');
        $placa->setLabel('Placa')
        ->setAttrib('id', 'placa')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim');
            //->addValidator('NotEmpty');
        $tipo = new Zend_Form_Element_Text('tipo');
        $tipo->setLabel('Tipo')
        	->setAttrib('id', 'tipo')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim');
            //->addValidator('NotEmpty');
        $boton = new Zend_Form_Element_Button('Agregar');
        
        $boton->setAttrib('id', 'boton');
        	    
        
        $this->addElements(array($id, $nombre, $placa, $tipo, $boton));
    }
}