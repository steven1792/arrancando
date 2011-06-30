<?php

class Application_Form_confirmaeliminar extends Zend_Form
{

    public function inicia($data)
    {
        
        $this->setName("confirmaeliminar");
        
        $nombre = new Zend_Form_Element_Hidden('nombre');
        $nombre->setAttrib('id', 'nombre')
        	   ->setValue($data);
        	   
       
        
        $boton_si = new Zend_Form_Element_Button("si");
        $boton_si->setAttrib('id', 'botonsi');
        
        $boton_no = new Zend_Form_Element_Button("no");
        $boton_no->setAttrib('id', 'botonno');
        
        $this->addElements(array($nombre,$boton_si, $boton_no));
    	
    }

}