<?php
App::uses('AppController', 'Controller');

class DashboardController extends AppController {
    public $uses = array('Post');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout='home';
    }
    
    public function index() {
        
        $title = 'Dashboard Page';
        $this->set('title', $title );

        $description = 'Dashboard Welcome';
        $this->set('description', $description );

        $keywords = 'Dashboard Welcome';
        $this->set('keywords', $keywords ); 
        
        if (!$this->Session->read('Admin.user_id')) {
           $this->redirect(array('controller'=>'Admin','action'=>'Login'));
        }
        
       
        
        $post_count = $this->Post->find('count',array('type' => 'available'));
        
        $this->set('post_count', $post_count);
    }
}