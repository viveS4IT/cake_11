<?php
App::uses('AppController', 'Controller');

class CitiesController extends AppController {
    public $uses = array('City');
    public $components = array('DataTable');
    
    public function index(){
        
       
        if($this->RequestHandler->responseType() == 'json') {
            
            $this->paginate = array(
                'fields' => array('id', 'name', 'state_id' , 'population')
            );
           
//            echo "<pre>";
//            print_r($this->DataTable->getResponse());
//            exit;
          
            $this->DataTable->mDataProp = true;
         
            $this->set('response',$this->DataTable->getResponse());
            $this->set('_serialize','response');
            
            
            
        }
    }
  
    public function view($id = NULL ) {
        $City = $this->City->findById($id);
        
        
        if (!$this->City->exists($id)) {
            throw new NotFoundException(__('Invalid post'));
        }
        $options = array('conditions' => array('City.' . $this->City->primaryKey => $id));
       
        $this->set('post', $this->City->find('first', $options));
        $this->set(array(
            'City' => $City,
            '_serialize' => array('City')
        ));
    }
    
    public function edit($id = NULL) {
        if( $this->request->is('ajax') ) {
            $id = $this->request->data('id');
            
            $City = $this->City->findById($id);
        
            
            if (!$this->City->exists($id)) {
                throw new NotFoundException(__('Invalid post'));
            }
            $options = array('conditions' => array('City.' . $this->City->primaryKey => $id));

            $this->set('City', $this->City->find('first', $options));
            
       
        }
    }
    
    public function save($id = NULL) {
        $id = $this->request->params['pass'][0];
        $this->City->id = $id;
        
       if( $this->City->exists($this->City->id) ){
           if( $this->request->is( 'post' ) || $this->request->is( 'put' ) ){
                if( $this->City->save( $this->request->data ) ){
                    $message = 'Saved';
                    $this->Session->setFlash('Your post has been saved.', 'default', array('class' => 'text-success alert alert-success text-center mb-2'));

                    $this->redirect(array('action' => 'index'));

                }else{
                    $message = 'Error';
                    $this->Session->setFlash('The post could not be saved. Please, try again.', 'default', array('class' => 'text-danger alert alert-danger text-center mb-2'));
                }
           }
       }
        
    }
    
    public function ajax() {
        if( $this->request->is('ajax') ) {
            $id = $this->request->data('id');
            
            $City = $this->City->findById($id);
        
            
            if (!$this->City->exists($id)) {
                throw new NotFoundException(__('Invalid post'));
            }
            $options = array('conditions' => array('City.' . $this->City->primaryKey => $id));

            $this->set('post', $this->City->find('first', $options));
            $this->set(array(
                'City' => $City,
                '_serialize' => array('City')
            ));
        }
    }
    
    public function delete() {
        if( $this->request->is('ajax') ) {
            $id = $this->request->data('id');
           
            if (!$this->City->exists($id)) {
                    throw new NotFoundException(__('Invalid post'));
            }
            if  ($this->City->delete($id)) {
                    $this->Session->setFlash(__('The post has been deleted.'));
                   
            }   else {
                    $this->Session->setFlash(__('The post could not be deleted. Please, try again.'));
            }
            return $this->redirect(array('action' => 'index'));
        }
    }
    
    public function containable(){
        if($this->RequestHandler->responseType() == 'json') {
            $this->paginate = array(
                'fields' => array('id', 'name', 'population'),
                'contain' => array(
                    'State' => array(
                        'fields' => array('id','name','abbrev')
                    )
                )
            );
            
            $this->DataTable->mDataProp = true;
            $this->set('response', $this->DataTable->getResponse());
            $this->set('_serialize','response');
        }
    }
    
    public function concat(){
        if($this->RequestHandler->responseType() == 'json') {
            $this->paginate = array(
                'fields' => array('City.id', 'CONCAT(City.name," / ",City.population) as together'),
                'link' => array(
                    'State' => array(
                        'fields' => array('id','name','abbrev')
                    )
                )
            );
            
            $this->DataTable->mDataProp = true;
            $this->set('response', $this->DataTable->getResponse());
            $this->set('_serialize','response');
        }
    }
    
    public function virtualFields(){
        if($this->RequestHandler->responseType() == 'json') {
            
            $this->City->virtualFields = array(
                'together' => 'CONCAT(City.name," / ",City.population)'
            );
            
            $this->paginate = array(
                'fields' => array('id','together','population'),
                'link' => array(
                    'State' => array(
                        'fields' => array('id','name','abbrev')
                    )
                )
            );
            
            $this->DataTable->mDataProp = true;
            $this->set('response', $this->DataTable->getResponse());
            $this->set('_serialize','response');
        }
    }
    
    public function noJsonHandler(){
        if($this->request->is('ajax')){
            $this->autoRender = false;
            $this->paginate = array(
                'fields' => array('id', 'name', 'population'),
                'link' => array(
                    'State' => array(
                        'fields' => array('name')
                    )
                )
            );

            $this->DataTable->mDataProp = true;
            echo json_encode($this->DataTable->getResponse());
           
        }
    }
}
