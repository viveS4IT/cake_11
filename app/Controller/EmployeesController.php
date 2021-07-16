<?php
App::uses('AppController', 'Controller');
    
    class EmployeesController extends AppController{
        public function beforeFilter() {
            parent::beforeFilter();
            $this->layout='home';
        }
        
            
        
        public function index() {
            $this->set('employees', $this->Employee->find('all'));
        }
       
        
        public function add() {
            if ($this->request->is('post')) {
                $this->Employee->create();
                if ($this->Employee->save($this->request->data)) {
                    $this->Session->setFlash('Your post has been saved.');
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Flash->error(__('Unable to add your post.'));
            }
        }
        
        public function edit() {
            //get the id of the user to be edited
            $id = $this->request->params['pass'][0];

            //set the user id
            $this->Employee->id = $id;

            //check if a user with this id really exists
            if( $this->Employee->exists() ){

                if( $this->request->is( 'post' ) || $this->request->is( 'put' ) ){
                    //save user
                    if( $this->Employee->save( $this->request->data ) ){

                        //set to user's screen
                        $this->Session->setFlash('User was edited.');

                        //redirect to user's list
                        $this->redirect(array('action' => 'index'));

                    }else{
                        $this->Session->setFlash('Unable to edit user. Please, try again.');
                    }

                }else{

                    //we will read the user data
                    //so it will fill up our html form automatically
                    $this->request->data = $this->Employee->read();
                }

            }else{
                //if not found, we will tell the user that user does not exist
                $this->Session->setFlash('The user you are trying to edit does not exist.');
                $this->redirect(array('action' => 'index'));


            }


        }
        
        public function delete() {
            $id = $this->request->params['pass'][0];

            //the request must be a post request 
            //that's why we use postLink method on our view for deleting user
            if( $this->request->is('get') ){

                $this->Session->setFlash('Delete method is not allowed.');
                $this->redirect(array('action' => 'index'));

                //since we are using php5, we can also throw an exception like:
                //throw new MethodNotAllowedException();
            }else{

                if( !$id ) {
                    $this->Session->setFlash('Invalid id for user');
                    $this->redirect(array('action'=>'index'));

                }else{
                    //delete user
                    if( $this->Employee->delete( $id ) ){
                        //set to screen
                        $this->Session->setFlash('User was deleted.');
                        //redirect to users's list
                        $this->redirect(array('action'=>'index'));

                    }else{  
                        //if unable to delete
                        $this->Session->setFlash('Unable to delete user.');
                        $this->redirect(array('action' => 'index'));
                    }
                }
            }
        }
    }
        