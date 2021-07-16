<?php if ($this->Session->read('Admin.user_id')) { ?>
  
    <div class="sidebar">
            <ul>
                <li class="tab"><?php echo $this->Html->link(__('Dahboard'), array('controller' => 'dashboard','action' => 'index')); ?></li>
                <li class="tab"><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts','action' => 'index')); ?></li>
            </ul>
    </div>
<?php 
} 
?>
