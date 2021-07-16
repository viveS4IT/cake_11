<?php
App::uses('AppModel', 'Model');
class EmpsModel extends AppModel {
    public $useDbConfig = 'emps';
    public $displayField = 'emp';
    public $name        = 'emps';  
    public $useTable    = 'emps'; 
    public $primaryKey = 'emp.id';
    
    public function GetID() {
        $output = array(
            'id' => '23'
        );
        
        return $output;
    }
        

}
?>
