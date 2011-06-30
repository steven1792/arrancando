<?php

//todas  la funciones  que  se hacen  
class IndexController extends Zend_Controller_Action
{

    public function init()
    {
    
    }

    public function indexAction()
    {
    
    }

    //muestra  los controles  para agregar 
    public function mostraragrAction()
    {
        try {
            $form = new Application_Form_agregar();
            $form->setAction('index/agregar');
            $this->view->form = $form;
            
            if(! $this->getRequest()
                ->isPost()) {
                $this->_helper->json(
                                    array('status' => 'ok', 
                                        'body' => $this->view->render(
                                                                    'index/agregar.phtml')));
            }
        
        } catch(Exception $e) {
            $this->_helper->json(array('error' => $e));
        }
    }

    //agrega  datos  
    public function agregarAction()
    {
        $form = new Application_Form_agregar();
        $this->view->form = $form;
        if($this->getRequest()
            ->isPost()) {
            $formdata = $this->getRequest()
                ->getPost();
            if($form->isValid($formdata)) {
                $nombre = $form->getValue('nombre');
                $placa = $form->getValue('placa');
                $tipo = $form->getValue('tipo');
                $buses = new Application_Model_Dbtable_buses();
                $buses->agregarBuses($nombre, $placa, $tipo);
                $this->_helper->json(
                                    array('status' => 'ok', 
                                        'body' => $this->view->render(
                                                                    'index/inserto.phtml')));
            } else {
                
                // $form->populate($formdata);
                $this->_helper->json(
                                                    array('status' => 'error', 
                                                        'body' => $this->view->render(
                                                                                    'index/errorinserto.phtml')));
            }
        
        }
    
    }

    // muestra controles  para eliminar 
    public function muestraeliminarAction()
    {
        
        try {
            if(! $this->getRequest()
                ->isPost()) {
                $form = new Application_Form_eliminar();
                $this->view->form = $form;
                $this->_helper->json(
                                    array('status' => 'ok', 
                                        'body' => $this->view->render(
                                                                    'index/eliminar.phtml')));
            }
        } catch(Exception $e) {
            $this->_helper->json(array('error' => $e));
        }
    
    }

    //carga  formulario  para  eliminar  
    public  function  confirmaeliminarAction ()
    {
     	$request = $this->getRequest();
        $id = $request->getParam('nombre');	
    	$form = new Application_Form_confirmaeliminar();
    	$data = $id;
    	$form->inicia($data);
    	
    	
     	$this->view->form = $form ; 
    	   $this->_helper->json(
                                    array('status' => 'ok', 
                                        'body' => $this->view->render(
                                                                    'index/confirmaeliminar.phtml')));
    
    
    }
    
   
    //elimina  datos  
    public function eliminarAction()
    {
        
        $form = new Application_Form_eliminar();
        $this->view->form = $form;
        
        if($this->getRequest()
            ->isPost()) {
            $formdata = $this->getRequest()
                ->getPost();
            if($form->isValid($formdata)) {
                $id = $form->getValue('nombre');
                
                $buses = new Application_Model_Dbtable_buses();
                $buses->eliminarBuses($id);
            }
            $this->_helper->json(
                                array('status' => 'ok', 
                                    'body' => $this->view->render(
                                                                'index/elimino.phtml')));
        } else {
            $this->_helper->json(
                                array('status' => 'error', 
                                    'body' => $this->view->render(
                                                                'index/errorinserto.phtml')));
        }
    }

    //carga controles para editar
    public function cargaeditarAction()
    {
        try {
            $form = new Application_Form_editar();
            //$form->setAction('index/cargarcontroleseditar');
            $this->view->form = $form;
            
            $this->_helper->json(
                                array('status' => 'ok', 
                                    'body' => $this->view->render(
                                                                'index/editar.phtml')));
        
        } catch(Exception $e) {
            $this->_helper->json(array('error' => $e));
        }
    
    }

    //funcion que edita  datos 
    public function controleseditarAction()
    {
        try {
            $form = new Application_Form_controleseditar();
            $request = $this->getRequest();
            if($this->getRequest()
                ->isPost()) {
                $formdata = $this->getRequest()
                    ->getPost();
                if($form->isValid($formdata)) {
                    
                    $id = (int) $request->getParam('id');
                    $nombre = $request->getParam('nombre');
                    $placa = $request->getParam('placa');
                    $tipo = $request->getParam('tipo');
                    if($id != "" && $nombre != "" && $placa != "" && $tipo != "") {
                        $buses = new Application_Model_Dbtable_buses();
                        $buses->editarBuses($id, $nombre, $placa, $tipo);
                        $this->_helper->json(
                                            array('status' => 'ok', 
                                                'body' => $this->view->render(
                                                                            'index/edito.phtml')));
                    }else {
                     $this->_helper->json(
                                array('status' => 'error', 
                                    'body' => $this->view->render(
                                                                'index/erroredito.phtml')));
                    }
                }
            }
        
        } catch(Exception $e) {
            
            $this->_helper->json(
                                array('status' => 'error', 
                                    'body' => $this->view->render(
                                                                'index/erroredito.phtml')));
        }
    
    }

    //funcion que  me  trae  la consulta  por  id  obtenido de  un combo  box  por json  
    

    public function editarAction()
    {
        
        $request = $this->getRequest();
        $id = $request->getParam('idc');
        $buses = new Application_Model_Dbtable_buses();
        $data = $buses->obtenerBus($id);
        $form = new Application_Form_controleseditar();
        $form->crear($data);
        
        // $form->setAction('index/editar');
        $this->view->form = $form;
        //$form->populate($data);
        $this->_helper->json(
                                    array('status' => 'ok', 
                                        'body' => $this->view->render(
                                                                    'index/controleseditar.phtml')));
    
    }

    //asigna la vista  donde se genera el datatable
    public function databusesAction()
    {
        $buses = new Application_Model_Dbtable_buses();
        $this->view->buses = $buses->fetchAll();
    
    }

    //funcion para el datatable
    public function busesAction()
    {
        
        $this->_helper->json(
                            array('status' => 'ok', 
                                'body' => $this->view->render(
                                                            'index/tablabuses.phtml')));
    
    }

}

//}

