<h2>Users</h2>
<div class="container">
   <?php  echo $this->Session->flash(); ?>

<!-- link to add new users page -->
<div class='upper-right-opt'>
    <?php echo $this->Html->link( '+ New User', array( 'action' => 'add' ) ); ?>
</div>
 
<table style='padding:5px;' class="table text-center">
    <!-- table heading -->
    <tr style='background-color:#fff;'>
        <th>ID</th>
        <th>name</th>
        <th>phone_no</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
     
<?php
 
     foreach( $employees as $employee ){
         echo "<tr>";
            echo "<td>{$employee['Employee']['id']}</td>";
            echo "<td>{$employee['Employee']['name']}</td>";
            echo "<td>{$employee['Employee']['email']}</td>";
            echo "<td>{$employee['Employee']['phone_no']}</td>";
             
            //here are the links to edit and delete actions
            echo "<td class='actions'>";
                echo $this->Html->link( 'Edit', array('action' => 'edit', $employee['Employee']['id']));
                 
                //in cakephp 2.0, we won't use get request for deleting records
                //we use post request (for security purposes)
                echo $this->Form->postLink( 'Delete', array(
                        'action' => 'delete', 
                        $employee['Employee']['id']), array(
                            'confirm'=>'Are you sure you want to delete that user?' ) );
            echo "</td>";
        echo "</tr>";
     }
   
    
?>
     
</table>


</div>