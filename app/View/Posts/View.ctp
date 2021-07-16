<div class="main-section-widget">
    <h2><?php echo __('Post'); ?></h2>
    <div class="view-section">
        <div class="col-sm-12 row">
            <div class="col-sm-6">
                <div class="form-group d-flex">
                    <label class="col-sm-3"><?php echo __('Id'); ?></label>
                    <h5 class="col-sm-3"><?php echo h($post['Post']['id']); ?></h5>
                </div>
                <div class="form-group d-flex">
                    <label class="col-sm-3"><?php echo __('Title'); ?></label>
                    <h5 class="col-sm-3"><?php echo h($post['Post']['title']); ?></h5>
                </div>
                <div class="form-group d-flex">
                    <label class="col-sm-3"><?php echo __('Description'); ?></label>
                    <h5 class="col-sm-3"><?php echo h($post['Post']['description']); ?></h5>
                </div>
                <div class="form-group d-flex">
                    <label class="col-sm-3"><?php echo __('Video'); ?></label>
                    <h5 class="col-sm-3"><?php echo $this->Html->media( 
                                                                   
                                                                    array(
                                                                        '/app/webroot/video/'.$post['Post']['video'],
                                                                        
                                                                        array(
                                                                            'src' => '/app/webroot/video/'.$post['Post']['video'],
                                                                            'type' => "video/mp4; codecs='theora, vorbis'",

                                                                        ),
                                                                    ),
                                                                    array('width="400" height="200" controls autoplay')  
                                                                );
                    ?></h5>
                </div>
            </div>
           
        </div>
    </div>
</div>
