<?php

class Application_Model_Dbtable_buses extends Zend_Db_Table_Abstract
{
    
   // protected $_schema = 'arrancando';
    protected $_name = 'buses';
  //  protected $_primary = 'id';

    public function obtenerBus($id)
    {
       // $db = Zend_Db::factory('PDO_MYSQL', $options);
        //Zend_Db_Table_Abstract::setDefaultAdapter($db);
       
		/*$where = $this->getAdapter()->quoteInto('id = ?', $id);
    
     $dato = $this->fetchAll($where, 'id');
      */
		$buses =  new Application_Model_Dbtable_buses();
    	$select =$buses->select()->where('id = ?', $id);
		$row = $buses->fetchRow($select);
 
	    $datos = array('id'=>$row->id,
	    				'nombre'=>$row->nombre,	
	    				'placa' =>$row->placa,
	    				'tipo'=>$row->tipo		);
	//	print_r($datos) ;
        return $datos; 
    	
    	
    	
    	/*
    	$table = new Application_Model_Dbtable_buses();
        $select  = $table->select()->where('id = ?', $id);
 
 $row = $table->fetchRow($select);
          return $row;*/
        
    /*    $rows =
    $table->fetchRow($table->select()->where('id = ?', $id));
    print_r($table);
       /* 
        $select = $table->select();
        $select->where('id = ?', $id);
        
        $rows = $table->fetchRow($select);
        */
        
    
     //return $id;
    

    //	$id = (int) $id;
    /*$id = (int) $id;
       /* $datosbus = $this->fetchRow('id = ' . $id);
        if(! $datosbus) {
            throw new Exception("no se encontro el  id =  $id");
        }*/
    /* $datosbus = $this->find($id);
        return $id;*/
    
    }
    

    public function agregarBuses($nombre, $placa, $tipo)
    {
        $data = array('nombre' => $nombre, 'placa' => $placa, 'tipo' => $tipo);
        $this->insert($data);
    
    }

    public function eliminarBuses($id)
    {
        $this->delete('id=' . (int) $id);
    
    }

    public function editarBuses($id, $nombre, $placa, $tipo)
    {
        $data = array('nombre' => $nombre, 'placa' => $placa, 'tipo' => $tipo);
        $this->update($data, 'id = ' . (int) $id);
    
    }

}