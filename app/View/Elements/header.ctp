<?php echo $this->Html->docType(); ?>
<html lang="en">
    <head>
            <?php echo $this->Html->charset(); ?>
            <title>
                    <?php echo $title; ?>
            </title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <?php
                    define('BASEURL', '/cake_11/app/webroot/assets/');
                    echo $this->Html->meta('keywords', $keywords);
                    echo $this->Html->meta('description', $description);
                    echo $this->fetch('meta');
                    echo $this->fetch('css');   
                    echo $this->Html->css("main");
                    echo $this->Html->css("bootstrap.min");
                    echo $this->Html->css("bootstrap");
                    echo $this->Html->script("jquery-3.6.0.min");
            ?>
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
            <link href="<?php echo BASEURL; ?>fontawesome/css/fontawesome.css" rel="stylesheet"/>
            <link href="<?php echo BASEURL; ?>fontawesome/css/fontawesome.min.css" rel="stylesheet"/>
    </head>
    <body>
        
        <?php if ($this->Session->read('Admin.user_id')) { ?>
            <header>
                <div class="header-sections">
                    <div class="header-main-section">
                        <div class="header-main-box">
                            <div class="header-section-title">
                                <h3 class="w3-opacity text-white text-center">Welcome to <?php echo $this->session->read('Admin.first_name'); ?> <?php echo $this->session->read('Admin.last_name'); ?></h3>
                            </div>
                        </div>
                        <div class="header-account-setting">
                            <div class="account-users">
                                <i class="fas fa-user" id="user_modal"></i>
                            </div>
                            <div class="header-profile" id="user_profile">
                                <ul>
                                    <li><?php echo $this->Form->postLink(__('Log Out'), array('controller' => 'Admin', 'action' => 'logout', $this->session->read('Admin.user_id')), null, __('Are you sure you want to delete # %s?', $this->session->read('Admin.user_id'))); ?></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </header>
        <?php } ?>

