<?php

App::uses('AppController', 'Controller');

class EmpsController extends AppController {
    public $components = array('DataTable');
    
    function index(){
        $this->paginate = array(
            'fields' => array('Emp.first_name','Emp.last_name', 'Emp.gender'),
        );
        
        $this->DataTable->mDataProp = true;
        $this->set('response', $this->DataTable->getResponse());
        $this->set('_serialize','response');
    }
 
}

