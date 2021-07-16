<h2>Add New User</h2>
 
<div class="container text-center">
<!-- link to add new users page -->
<div class='upper-right-opt'>
    <?php echo $this->Html->link( 'List Users', array( 'action' => 'index' ) ); ?>
</div>
 
<?php 
//this is our add form, name the fields same as database column names
  echo  $this->Form->create('Employee');
 
    echo $this->Form->input('name');
    echo $this->Form->input('email');
    echo $this->Form->input('phone_no');
     
echo $this->Form->end('Submit');
?>

</div>