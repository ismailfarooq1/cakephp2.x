<?php
class Department extends AppModel {

    public $actAs = array('Containable');
    public $hasMany = array(
        'Student' => array(
            'className' => 'Student',
            'dependent' => true
        )
    );
    public $validate = array(
        'departmentname' => array(
            'rule' => 'notBlank',
            'message' => 'Enter the name of department.'
        ),
        'departmenthod' => array(
            'rule' => 'notBlank',
            'message' => 'Enter the departments HOD'
        )
    );
    
    public function beforeDelete($cascade = true) {
        $count = $this->Student->find('count', array(
            'recursive' => -1,
            'conditions' => array('Student.department_id' => $this->id)
            
        ));
        
       if ($count == 0) {
           return true;
       }
       else {
           return false;
       }
    }
}
