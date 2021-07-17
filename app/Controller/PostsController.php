<?php 

App::uses('AppController', 'Controller');

class PostsController extends AppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout='home';
    }
    
    public $components = array('Paginator' ,'RequestHandler');
    
    public function Index() {
        $title = 'Posts Index Page';
        $this->set('title', $title );

        $description = 'Posts title and decriptions Index';
        $this->set('description', $description );

        $keywords = 'Posts title and decriptions Index';
        $this->set('keywords', $keywords ); 
        
        $query = '';
        $conditions = '';
        if (isset($this->request->query['data']['search'])) {
            $key = $this->request->query['data']['search'];
            
            if ($key) {
                $conditions = array("Post.title LIKE" => "%$key%");
                
                $query = $this->Post->find('list', array('conditions' => $conditions));
                
               
            } else {
                $query = $this->Post->find('all');
                $conditions = '1=1';
            }            
        } 
        
         
        
        $this->Paginator->settings = $this->paginate;
        
        $this->Paginator->settings = array(
            'conditions' => $conditions,
            'limit' => 3,
            'order' => array('id' => 'asc')
        );
       
        $this->set('posts', $this->Paginator->paginate());
        $this->set('_serialize', array('posts'));
       
    }
    
    public function Add() {
        $title = 'Posts Add Page';
        $this->set('title', $title );

        $description = 'Posts title and decriptions Add';
        $this->set('description', $description );

        $keywords = 'Posts title and decriptions Add';
        $this->set('keywords', $keywords );
        
        $valid_formats = array("mp4","MP4","flv","mkv");
        if ($this->request->is('post')) {
            $this->Post->create();

            $name = $this->request->data['Post']['video']['name'];
            $size = $this->request->data['Post']['video']['size'];
            if(strlen($name)) {
                $file_info = pathinfo($this->request->data['Post']['video']['name']);
                $filename = $file_info['filename'];
                
                $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION)); 
               
                $name = (microtime(true) * 10000)."-".$filename;
                if(in_array($ext,$valid_formats)) {
                    if($size<(50024*50024)) {
                        $videoPath = $_SERVER['DOCUMENT_ROOT'] . '/cake_11/app/webroot/video/';
                        $GetVideoName = $name;
                        $video_ext=$ext;
                        $namesddsa = $GetVideoName.'.'.$video_ext;
                      
                        $tmp = $this->request->data['Post']['video']['tmp_name'];
                        if(move_uploaded_file($tmp, $videoPath.$GetVideoName.'.'.$video_ext)) {
                           $videoUrlp = $videoPath.$GetVideoName;
                           $this->request->data['Post']['video'] = $namesddsa;
                           
                            echo exec("/usr/local/bin/ffmpeg -i $videoUrlp.$video_ext -vf 'scale=min(1280,min(iw,round(1280*iw/ih))):-2' -b:v 2500k -b:a 320k -filter:v 'scale=w=1280:h=720' $name.$video_ext");
                            echo exec("/usr/local/bin/ffmpeg -i $videoUrlp.$video_ext -deinterlace -an -ss 5 -f mjpeg -t 1 -r 1 -y -s 320x240 $name.png 2>&1");
                            echo exec("/usr/local/bin/ffmpeg -i $videoUrlp.$video_ext -vn -ar 44100 -ac 2 -b:a 320k $name.mp3");
//                            echo exec("/usr/local/bin/ffmpeg -i $videoUrlp.$video_ext -filter:v scale=320x240 -c:a copy $name.$video_ext");
                        } else {
                            echo "Fail upload folder with read access.";
                        }
                    }
                }
            }
               

  
            if ($this->Post->save($this->request->data)) {
                $message = 'Saved';
                $this->Session->setFlash('Your post has been saved.', 'default', array('class' => 'text-success alert alert-success text-center mb-2'));
                return $this->redirect(array('action' => 'Index'));
            }  else {
                $this->Session->setFlash('Your post has been saved.', 'default', array('class' => 'text-danger alert alert-danger text-center mb-2'));
                $message = 'Error';
            }
            
            $this->set(array(
                'message' => $message,
                '_serialize' => array('message')
            ));
        } 
    }
    
    public function view($id = NULL ) {
        $Post = $this->Post->findById($id);
        $title = 'Posts View Page';
        $this->set('title', $title );

        $description = 'Posts title and decriptions View';
        $this->set('description', $description );

        $keywords = 'Posts title and decriptions View';
        $this->set('keywords', $keywords );
        
        if (!$this->Post->exists($id)) {
            throw new NotFoundException(__('Invalid post'));
        }
        $options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
        
        $this->set('post', $this->Post->find('first', $options));
        $this->set(array(
            'Post' => $Post,
            '_serialize' => array('Post')
        ));
    }
    
    public function Edit() {
        $title = 'Posts Edit Page';
        $this->set('title', $title );

        $description = 'Posts title and decriptions Edit';
        $this->set('description', $description );

        $keywords = 'Posts title and decriptions Edit';
        $this->set('keywords', $keywords ); 
        $id = $this->request->params['pass'][0];
        $this->Post->id = $id;
        
        $images = '';
        if( $this->Post->exists() ){
           
            $images = $this->Post->find('all', array(
            'conditions' => array('Post.id ='.$this->Post->id),
            ));
          
            if( $this->request->is( 'post' ) || $this->request->is( 'put' ) ){
                
                $video_name = $images[0]['Post']['video'];
                $file_info = pathinfo($this->request->data['Post']['video']['name']);
                $filename = $file_info['filename'];
         
                $folderName = '/cake_11/app/webroot/' . 'video' . DS . $video_name;

                
                if (!isset($this->request->data['Post']['video']['name'])) {
                    $file = $this->request->data['Post']['video']['name'];
                    $imagesname1 = (microtime(true) * 10000).$filename;
                    $ext = substr(strtolower(strrchr($file, '.')), 1);
                    $arr_ext = array('mkv', 'mp4', 'MP4','flv');

                    if (in_array($ext, $arr_ext)) {
                        move_uploaded_file($this->request->data['Post']['video']['tmp_name'],  $_SERVER['DOCUMENT_ROOT'] .'/cake_11/app/webroot/video/' . $imagesname1);
                        $this->request->data['Post']['Video']  = $imagesname1;
                    } else {
                        $this->redirect(array('action' => 'Edit'));
                    }
                } else {
                    $this->request->data['Post']['video']  = $video_name;
                }
                
                if( $this->Post->save( $this->request->data ) ){
                    $message = 'Saved';
                    $this->Session->setFlash('Your post has been saved.', 'default', array('class' => 'text-success alert alert-success text-center mb-2'));

                    $this->redirect(array('action' => 'index'));

                }else{
                    $message = 'Error';
                    $this->Session->setFlash('The post could not be saved. Please, try again.', 'default', array('class' => 'text-danger alert alert-danger text-center mb-2'));
                }
                $this->set(array(
                    'message' => $message,
                    '_serialize' => array('message')
                ));

            }else{

                $this->request->data = $this->Post->read();
            }

        } else{
            $this->Session->setFlash('The post you are trying to edit does not exist.');
            $this->redirect(array('action' => 'index'));
        }
    }
    
    public function Delete($id = NULL) {
        $this->Post->id = $id;
        if (!$this->Post->exists()) {
                throw new NotFoundException(__('Invalid post'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Post->delete()) {
                $this->Session->setFlash(__('The post has been deleted.'));
        } else {
                $this->Session->setFlash(__('The post could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}

?>