<?php
class StudentCourse extends AppModel {

    public $actsAs = array('Containable');
    public $belongsTo = array(
        'Student' => array(
            'className' => 'Student',
            'foreignKey' => 'student_id',
            'dependent' => true
        ),
        'Course' => array(
            'className' => 'Course',
            'foreignKey' => 'course_id',
            'dependent' => 'true'
        )
    );
    public $validate = array(
        'course_id' => array(
            'rule' => 'notBlank',
            'message' => 'Select a course or go back.'
        )
    );

    public function beforeSave($options = array()) {
        $b = $this->find('count', array(
            'conditions' => array(
                'StudentCourse.course_id' => $this->data['StudentCourse']['course_id'],
                'StudentCourse.student_id' => $this->data['StudentCourse']['student_id']
            ),
            'recursive' => -1
        ));
        if ($b == 0) {
            return true;
        } 
        else {
            return false;
        }
    }
}
