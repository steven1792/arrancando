<?php

class Application_Form_eliminar extends Zend_Form
{

    public function init()
    {
        $this->setName('eliminar');
        
        $nombre = new Zend_Form_Element_Select('nombre');
        $nombre->setLabel('nombre');
        $table = new Application_Model_Dbtable_buses();
        foreach($table->fetchAll() as $c) {
            $nombre->addMultiOption($c->id, $c->nombre);
        }
        
        $boton= new Zend_Form_Element_Button('Eliminar');
        $boton->setAttrib('id', 'boton');
        
        $this->addElements(array($nombre, $boton));
    }
}