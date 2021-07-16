<div class="main-section-widget">
    
<?php
$posts = ''; 
echo $this->Form->create('Post', array('type' => 'file')); 
$id = $this->request->data['Post']['id'];
$images = $this->request->data['Post']['video'];
$path = '/app/webroot/';
?>
    <fieldset>
        <h5><?php echo $this->Session->flash(); ?></h5>
        <legend><?php echo __('Add Post'); ?></legend>
        <div class="col-sm-12">
            <div class="form-group row">
                <?php 
                    echo $this->Form->input('title'); 
                ?>
            </div>
            <div class="form-group row">
                <?php
                    echo $this->Form->input('description');
                ?>
            </div>
            <div class="form-group row">
                <?php 

                    echo $this->Form->input('video', array('type' => 'file','id'=>'video'));
                    echo $this->Html->media(                                   
                            array(
                                '/app/webroot/video/'.$this->request->data['Post']['video'],

                                array(
                                    'src' => '/app/webroot/video/'.$this->request->data['Post']['video'],
                                    'type' => "video/mp4; codecs='theora, vorbis'",

                                ),
                            ),
                            array('width="400" height="200" controls autoplay')  
                        );
                     
                ?>
            </div>
        </div>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
