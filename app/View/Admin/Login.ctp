<section>
    <div class="admin-section" style="height: 100vh;">
        <div class="login-section">
            <div class="container">
                <div class="login-section-main">
                     <?php
//                        echo "<pre>";
//                        print_r($email);
//                        exit;
                     ?>
                    <h3><?php echo $this->session->Flash(); ?></h3>

                    <?php echo $this->Form->create('Admin' , array('class' => 'form')) ?>
                    <h3 class="mb-3">Login</h3>
                    <div class="form-group">
                        <?php
                           
                            echo $this->Form->input('email', array('error',
                                'div' => 'clearfix',
                                'label'=>false,
                                'id'=>'email',
                                'value' => isset($email) ? $email : '',
                                'class'=>'form-control',
                                'placeholder'=>'Email',
                                'required'=>'required'
                            ));
                        ?>
                        <div class="ErrorMessage">
                        </div>
                    </div>

                    <div class="form-group">
                        <?php
                            echo $this->Form->input('password', array('error',
                                'div' => 'clearfix',
                                'label'=>false,
                                'id'=>'password',
                                'value' => isset($password) ? $password : '',
                                'class'=>'form-control',
                                'type'=>'password',
                                'placeholder'=>'Password',
                                'required'=>'required'
                            ));
                        ?>
                        <div class="ErrorMessage">

                        </div>
                    </div>
                    <div class="ErrorMessage">
                    </div>
                    <div class="remember-me">
                       <?php echo $this->Form->checkbox('remember_me', array(isset($email) ? 'checked' : '')) ?>
                        <label class="mb-0 ml-2" for="remember">Remember Me</label>
                    </div>
                    <div>
                        <p class="message mb-2">Not registered? <?php echo $this->Html->link('Create an account',array('controller' => 'admin','action' => 'registered')); ?></p>
                    </div>
                    <?php 
                        $options = array(
                            'label' => 'submit',
                            'id' => 'submit',
                            'name' => 'submit' , 
                            'class' => 'btn btn-primary bg-primary px-3 py-2'
                        );
                        echo $this->Form->end($options); 
                    ?>

                </div>
            </div>
        </div>
    </div>
    
</section>