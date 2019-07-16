<?php
class Course extends AppModel {

    public $actsAs = array('Containable');
    public $hasMany = array(
        'StudentCourse' => array(
            'className' => 'StudentCourse',
            'dependent' => true
        )
    );
    public $validate = array(
        'coursename' => array(
            'rule' => 'notBlank',
            'message' => 'Enter Course Name.'
        ),
        'courseteacher' => array(
            'rule' => 'notBlank',
            'message' => 'Enter the course teacher.'
        )
    );
}
