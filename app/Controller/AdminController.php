<?php

App::uses('AppController', 'Controller');

class AdminController extends AppController {
    public $components = array('RequestHandler' , 'Cookie');
    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('email', $this->Cookie->read('email'));
        $this->set('password', $this->Cookie->read('password'));
        $this->layout='AdminHome';
    }
    
    public function Login() {
       $title = 'Login Page';
       $this->set('title', $title );
      
       $description = 'User login page';
       $this->set('description', $description );
        
       $keywords = 'User login page';
       $this->set('keywords', $keywords ); 
       
        if ($this->Session->read('Admin.user_id')) {
            $this->redirect(array('controller'=>'Dashboard','action'=>'Index'));
        }
       
        if($this->request->is('post')) {
        
                
            $email = $this->request->data['Admin']['email'];
            $pass = $this->request->data['Admin']['password'];
            $remember_me = $this->request->data['Admin']['remember_me'];

            $check= $this->Admin->find('first', array(
                'conditions' => array(
                    'AND' => array(
                        array('Admin.email' => $email),
                        array('Admin.password' => $pass)
                    )
                )
            ));
            
            if($check !=null) {
                $this->Session->write('Admin.user_id',$check['Admin']['id']);
                $this->Session->write('Admin.first_name',$check['Admin']['first_name']);
                $this->Session->write('Admin.last_name',$check['Admin']['last_name']);
                
                
                if (!empty($remember_me)) {
                    $this->Cookie->write('email',$check['Admin']['email'], false, '1 years');
                    $this->Cookie->write('password',$check['Admin']['password'],false, '1 years');
                } else {
                    $this->Cookie->delete('email');
                    $this->Cookie->delete('password');
                }
              
                $this->redirect(array('controller'=>'Dashboard','action'=>'Index'));
            } else {
                   
                $this->Session->setFlash('Invalid Username or Password', 'default', array('class' => 'text-danger alert alert-danger text-center mb-2'));
            }
            
        }
    }
    
    public function logout() {
        
        
        $this->Session->delete('Admin.user_id');
        $this->Session->delete('Admin.username');
        $this->Session->delete('Admin.last_name');
        
        
        $this->Session->setFlash('successfully LogOut', 'default', array('class' => 'text-success alert alert-success text-center mb-2'));
        $this->redirect(array('controller'=>'Admin','action'=>'login'));
    }
    
    public function Registered() {
       $title = 'Registered Page';
       $this->set('title', $title );
       
       $description = 'Employee Registered page';
       $this->set('description', $description );
        
       $keywords = 'Employee Registered page';
       $this->set('keywords', $keywords );
              
       if ($this->request->is('post')) {
           $this->Admin->create();
           $this->request->data['Admin']['hobbies'] =  implode(',', $this->request->data['Admin']['hobbies']);
           $this->request->data['Admin']['salary'] = number_format($this->request->data['Admin']['salary'] , 2, '.', ',');
           $this->request->data['Admin']['joining_date'] =  date('Y-m-d H:i:s',strtotime(implode('-', $this->request->data['Admin']['joining_date'])));
           $this->request->data['Admin']['dob'] =  date('Y-m-d H:i:s',strtotime(implode('-', $this->request->data['Admin']['dob'])));
           
           if (is_uploaded_file($this->request->data['Admin']['images']['tmp_name'])) {
                $filename = $this->request->data['Admin']['images']['name'];
                $imagesname = date('d-m-Y') . "-" . time() . "-" . $filename;
                $filechecl = move_uploaded_file(
                    $this->request->data['Admin']['images']['tmp_name'], 
                    $_SERVER['DOCUMENT_ROOT'] . '/cake_11/app/webroot/img/dir/' . $imagesname
                );
                
                $this->request->data['Admin']['images'] = $imagesname;;
            } 
            
           if ($this->Admin->save($this->request->data)) {
                $this->Session->setFlash('Your Registered has been saved.', 'default' , array('class' => 'text-success alert alert-success text-center mb-2'));
                return $this->redirect(array('action' => 'Login'));
            }  else {
                $this->Session->setFlash('Please try again.');
                return $this->redirect(array('action' => 'Registered'));
            }
           
        }
    }
}