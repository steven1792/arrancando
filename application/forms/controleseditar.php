<?php
class  Application_Form_controleseditar extends Zend_Form
{
	public function crear($data){
	     $this->setName('editart');
         $this->setMethod('post');
         $this->setAction('index/editar');
		
		$id =  new  Zend_Form_Element_Hidden('id');
		$id->setAttrib('id', 'id');
         
         $nuevonombre = new Zend_Form_Element_Text('nombre');
        $nuevonombre->setLabel('Nuevo nombre:')
        ->setAttrib('id', 'nombre')
        	    ->addValidator('NotEmpty')
            ->setRequired(true)
            ->addFilter('StringTrim');
            
        
        $placa = new Zend_Form_Element_Text('placa');
        $placa->setLabel('Nueva placa:')
        ->setAttrib('id', 'placa')
            ->addValidator('NotEmpty')
            ->setRequired(true)
            ->addFilter('StringTrim');
            
        
        $tipo = new Zend_Form_Element_Text('tipo');
        $tipo->setLabel('Nuevo tipo:')
        	->setAttrib('id', 'tipo')
        	    ->addValidator('NotEmpty')
             ->setRequired(true)
            ->addFilter('StringTrim');
            
        
        $botoncarga = new Zend_Form_Element_Button('Editar');
        $botoncarga->setAttrib('id', 'boton');
        
       
        
        $this->addElements(array($id,$nuevonombre,$placa,$tipo,$botoncarga));
		$this->populate($data);
	}


}