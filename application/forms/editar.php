<?php

class Application_Form_editar extends Zend_Form
{

    public function init()
    {
        
        $this->setName('editar');
         $this->setMethod('post');
      
       
        
        $nombre = new Zend_Form_Element_Select('idc');        
        $nombre->setLabel('Nombre:')
        	    ->addFilter('Int')   
        		->setAttrib('id', 'idc');
        		
        $table = new Application_Model_Dbtable_buses();
        foreach($table->fetchAll() as $c) {
            $nombre->addMultiOption($c->id, $c->nombre);
        }
        
        /*  $nuevonombre = new Zend_Form_Element_Text('nombre');
        $nuevonombre->setLabel('Nuevo nombre:')
        ->setAttrib('id', 'nombre')
            ->setRequired(true)
            ->addFilter('StringTrim');
            
        
        $placa = new Zend_Form_Element_Text('placa');
        $placa->setLabel('Nueva placa:')
        ->setAttrib('id', 'placa')
            ->setRequired(true)
            ->addFilter('StringTrim');
            
        
        $tipo = new Zend_Form_Element_Text('tipo');
        $tipo->setLabel('Nuevo tipo:')
        	->setAttrib('id', 'tipo')
            ->setRequired(true)
            ->addFilter('StringTrim');
            
        
        $botoncarga = new Zend_Form_Element_Button('Editar');
        $botoncarga->setAttrib('id', 'boton');*/
       
        
        $this->addElements(array($nombre/*,$nuevonombre,$placa,$tipo,$botoncarga*/));
    
    }
}