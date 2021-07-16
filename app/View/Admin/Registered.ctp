<section>
    <div class="admin-section" style="height: 120vh;">
        <div class="register-section">
            <div class="container">
                <div class="register-section-main">
                    <h3 class="text-danger"><?php echo $this->session->Flash(); ?></h3>
                    <?php echo $this->Form->create('Admin' , array('class' => 'form','type' => 'file')) ?>
                        <h3 class="mb-3">REGISTERED</h3>
                        <div class="form-group col-sm-12 row">
                            <?php
                                echo $this->Form->input('first_name', array('First Name',
                                    'id'=>'first_name',
                                    'class'=>'form-control',
                                    'placeholder'=>'First Name'
                                ));
                            ?>
                            <div class="ErrorMessage first_name">
                            </div>
                        </div>
                       <div class="form-group col-sm-12 row">
                            <?php
                                echo $this->Form->input('last_name', array('Last Name',
                                    'id'=>'last_name',
                                    'class'=>'form-control',
                                    'placeholder'=>'Last Name'
                                ));
                            ?>
                            <div class="ErrorMessage last_name">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 row">
                            <?php
                                echo $this->Form->input('password', array('Password',
                                    'id'=>'password',
                                    'type'=>'password',
                                    'class'=>'form-control',
                                    'placeholder'=>'Password'
                                ));
                            ?>
                            <div class="ErrorMessage password_errr">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 row">
                            <?php

                                echo $this->Form->input('email', array('Email',
                                    'id'=>'email',
                                    'class'=>'form-control',
                                    'placeholder'=>'Email'
                                ));
                            ?>
                            <div class="ErrorMessage email_errr">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 row">
                            <?php
                                echo $this->Form->input('joining_date', array('Joining Date',
                                    'id'=>'joining_date',
                                    'type' => 'date',
                                    'minYear' => 2021,
                                    'maxYear' => 1950,
                                    'empty' => '(choose select)',
                                    'class'=>'form-control select_date',
                                    'placeholder'=>'Joining Date'
                                ));
                            ?>
                            <div class="ErrorMessage joining_date">

                            </div>
                        </div>
                        <div class="form-group col-sm-12 row">
                            <?php
                                echo $this->Form->input('salary', array('Salary',
                                    'id'=>'salary',
                                    'type' => 'number',
                                    'class'=>'form-control',
                                    'placeholder'=>'Salary'
                                ));
                            ?>
                            <div class="ErrorMessage salary">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 row">
                            <?php
                                echo $this->Form->input('dob', array('DOB',
                                    'id'=>'dob',
                                    'type' => 'date',
                                    'maxYear' => 1950,
                                    'minYear' => 2021,
                                    'empty' => '(choose select)',
                                    'class'=>'form-control dob_date',
                                    'placeholder'=>'DOB'
                                ));
                            ?>
                            <div class="ErrorMessage dob">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 row">
                            <?php
                                echo $this->Form->input('age', array('Age',
                                    'readonly' => true,
                                    'id'=>'age',
                                    'class'=>'form-control',
                                    'placeholder'=>'AGE'
                                ));
                            ?>
                        </div>
                        <div class="form-group col-sm-12 row">
                            <label class="col-sm-1 hobbies_title">Hobbies </label>
                            <div class="col-sm-7 d-flex align-items-baseline hobbies-box-main">
                                <?php echo $this->Form->checkbox('hobbies' , array('value' => 'Reading', 'id'=>'Reading' , 'name' => "data[Admin][hobbies][]" , 'hiddenField' => false)); ?>
                                <label class="mb-0 mr-2" for="Reading">Reading</label>
                                <?php echo $this->Form->checkbox('hobbies' , array('value' => 'Gaming', 'id'=>'Gaming', 'name' => "data[Admin][hobbies][]", 'hiddenField' => false)); ?>
                                <label class="mb-0 mr-2" for="Gaming">Gaming</label>
                                <?php echo $this->Form->checkbox('hobbies' , array('value' => 'Dancing', 'id'=>'Dancing', 'name' => "data[Admin][hobbies][]", 'hiddenField' => false)); ?>
                                <label class="mb-0 mr-2" for="Dancing">Dancing</label>
                                <?php echo $this->Form->checkbox('hobbies' , array('value' => 'Cricket', 'id'=>'Cricket', 'name' => "data[Admin][hobbies][]", 'hiddenField' => false)); ?>
                                <label class="mb-0 mr-2" for="Cricket">Cricket</label>
                            </div>


                            <div class="ErrorMessage hobbies">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 row">
                            <label class="col-sm-1 hobbies_title">Technology </label>
                            <div class="techlogy-box">
                                <?php

                                    $options = array('PHP' => 'PHP', 'C++' => 'C++', 'Web' => 'Web');
                                    $attributes = array('legend' => false , 'id' => 'technology');
                                    echo $this->Form->radio('technology', $options, $attributes);
                                ?>
                            </div>
                            <div class="ErrorMessage hobbies">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 row">
                            <?php
                                echo $this->Form->input('images', array('type' => 'file',
                                    'id'=>'images',
                                    'onchange' => 'validateImage()'
                                ));
                            ?>
                            <div class="ErrorMessage images">
                            </div>
                        </div>
                    <?php 

                        echo $this->Form->button('Submit', array('type' => 'submit' , 'id' => 'submit' ,'class' => 'btn btn-primary bg-primary px-3 py-2'));
                        echo $this->Html->link(
                            'Cancel',
                            '/admin/login',
                            array('class' => 'btn btn-danger bg-danger px-3 py-2')
                        );
                        echo $this->Form->end(); 
                    ?>
                </div>
            </div>
        </div>
    </div>
    
</section>

<script>
    function validateImage() {
        var formData = new FormData();
        var file = document.getElementById("images").files[0];
        formData.append("Filedata", file);
        var t = file.type.split('/').pop().toLowerCase();
        if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
            alert('Please select PNG , JPEG and JPG a valid image file');
            document.getElementById("images").value = '';
           return false;
        }
        return true
    }
    
    $(document).ready(function(){
        
        function getAge(dob) { return ~~((new Date()-new Date(dob))/(31556952000)) }
	$('.dob_date').change(function(){
		var dob = $(this).val();
		$('#age').val(getAge($(this).val()));
	});
        
        $('#submit').on('click' , function() {
            var first_name_error = true;
            var last_name_error = true;
            var password_error = true;
            var email_error = true;
            var joining_date_error = true;
            var salary_error = true;
            var dob_error = true;
            var hobbies_error = true;
            var images_error = true;
            
            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
            var password = $('#password').val();
            var email = $('#email').val();
            var joining_date = $('.select_date').val();
            var salary = $('#salary').val();
            var dob = $('.dob_date').val();
            var hobbies = $('#hobbies').val();
            var images = $('#images').val();
            
            $('.first_name').hide();
            $('.last_name').hide();
            $('.password_errr').hide();
            $('.email_errr').hide();
            $('.joining_date').hide();
            $('.salary').hide();
            $('.dob').hide();
            $('.hobbies').hide();
            $('.images').hide();
            
            var name_regex = '/^[a-zA-Z\u0600-\u06FF,-][\sa-zA-Z\u0600-\u06FF,-]*$/';
            if (first_name.length == '') {
                $('.first_name').html('First Name Required.');
                $('.first_name').show();
                 first_name_error = false;
            } else if(!first_name.match(name_regex)) {
                $('.first_name').html('Valid First Name Required.');
                $('.first_name').show();
                first_name_error = false;
            } else {
                $('.first_name').hide();
            }
            
            if (last_name.length == '') {
                $('.last_name').html('Last Name Required.');
                $('.last_name').show();
                last_name_error = false;
            } else if(!first_name.match(name_regex)) {
                $('.last_name').html('Valid Last Name Required.');
                $('.last_name').show();
                last_name_error = false;
            } else {
                $('.last_name').hide();
            }
            
            if (password.length == '') {
                $('.password_errr').html('password Required.');
                $('.password_errr').show();
                 password_error = false;
            } else if(password.length <= 6) {
                $('.password_errr').html('Minimum 8 characters.');
                $('.password_errr').show();
                password_error = false;
            } else {
                $('.password_errr').hide();
            }
            
            var regex = /^\s*(([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5}){1,25})+([;.](([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5}){1,25})+)*\s*$/;
            if (email.length == '') {
                $('.email_errr').html('Email Required.');
                $('.email_errr').show();
                email_error = false;
            } else if(!regex.test(email)) {
                $('.email_errr').html('Invalid Email.');
                $('.email_errr').show();
                email_error = false;
            } else {
                $('.email_errr').hide();   
            }
            
            if (joining_date == '') {
                
                $('.joining_date').html('Joining Date Required.');
                $('.joining_date').show();
                joining_date_error = false;
            } else {
                $('.joining_date').hide();
            }
            
            if (salary == '') {
                $('.salary').html('Salary Required.');
                $('.salary').show();
                salary_error = false;
            } else {
                $('.salary').hide();
            }
            
            if (dob == '') {
                $('.dob').html('DOB Required.');
                $('.dob').show();
                dob_error = false;
            } else {
                $('.dob').hide();
            }
          
            if ($('input[type=checkbox]:checked').length == 0) {
                $('.hobbies').html('Please select at least one.');
                $('.hobbies').show();
                hobbies_error = false;
            } else {
                $('.hobbies').hide();
            }
   
            if ((first_name_error == true) 
                && (last_name_error == true) 
                && (password_error == true)
                && (email_error == true) 
                && (joining_date_error == true)
                && (salary_error == true)
                && (dob_error == true)
                && (hobbies_error == true)
                && (images_error == true)
            ) {
                return true;
            } else {
                return false;
                
            }
        });
    });
</script>
