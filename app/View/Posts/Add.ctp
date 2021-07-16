<div class="main-section-widget"> 
    <?php echo $this->Form->create('Post', array('type' => 'file')); ?>
        <fieldset>
            <h5><?php echo $this->Session->flash(); ?></h5>
            <legend><?php echo __('Add Post'); ?></legend>
            <div class="col-sm-12">
                <div class="form-group row">
                    <?php 
                        echo $this->Form->input('title', array('id' => 'title')); 
                    ?>
                    <div class="ErrorMessage title"></div>
                </div>
                <div class="form-group row">
                    <?php
                        echo $this->Form->input('description', array('id' => 'description'));
                    ?>
                    <div class="ErrorMessage description"></div>
                </div>
                <div class="form-group row">
                    <?php 
                        echo $this->Form->input('video', array('type' => 'file','id'=>'video','onchange' => 'validateImage()' , 'name'=> 'data[Post][video]', 'label'=>'Video Upload', 'accept'=> 'video' ));
                    ?>
                    <div class="ErrorMessage video">
                    </div>
                </div>
            </div>
        </fieldset>
        <?php echo $this->Form->button('Submit', array('type' => 'submit' , 'id' => 'submit' ,'class' => 'btn btn-primary bg-primary px-3 py-2')); ?>
    <?php echo $this->Form->end(); ?>
</div>

<script>
    function validateImage() {
        var formData = new FormData();
        var file = document.getElementById("video").files[0];
        formData.append("Filedata", file);
        var t = file.type.split('/').pop().toLowerCase();
        if (t != "AVI" && t != "mp4" && t != "WEBM" && t != "MKV" && t != "WMV") {
            alert('Please select mp4 , WEBM and MKV a valid video file');
            document.getElementById("video").value = '';
           return false;
        }
        return true
    }
    $(document).ready(function(){
        $('#submit').on('click' , function() {
            var title_error = true;
            var decriptions_error = true;
            var video_error = true;
            
            var title = $('#title').val();
            var description = $('#description').val();
            var video = $('#video').val();
            
            $('.title').hide();
            $('.description').hide();
            $('.video').hide();
            if (title.length == '') {
                $('.title').html('Title Required.');
                $('.title').show();
                title_error = false;
            } else {
                $('.title').hide();
            }
            
            if (description.length == '') {
                $('.description').html('Description Required.');
                $('.description').show();
                decriptions_error = false;
            } else {
                $('.description').hide();
            }
            
            if (video == '') {
                $('.video').html('video Required.');
                $('.video').show();
                video_error = false;
            } else {
                $('.video').hide();
            }
            
           
            if ((title_error == true) && (decriptions_error == true) && (video_error == true)) {
                return true;
            } else {
                return false;
                
            }
        });
    });
</script>