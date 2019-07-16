<?php
class Student extends AppModel {

    public $actsAs = array('Containable');
    public $belongsTo = array(
        'Department' => array(
            'className' => 'Department',
            'dependent' => true
        )
    );
    public $hasMany = array(
        'StudentCourse' => array(
            'className' => 'StudentCourse',
            'dependent' => true
        )
    );
    public $validate = array(
        'name' => array(
            'nameRule1' => array(
                'rule' => 'notBlank',
                'message' => 'Enter a name, please.',
            ),
            'nameRule-2' => array(
                'rule' => array('maxLength', 25),
                'message' => "Enter name less than 25."
            )
        ),
        'department_id' => array(
            'rule' => 'notBlank',
            'message' => 'Select your department.'
        ),
        'cgpa' => array(
            'cgpaRule-1' => array(
                'rule' => 'numeric',
                'message' => 'Enter a valid number',
                'required' => 'true'
            ),
            'cgpaRule-2' => array(
                'rule' => array('maxLength', 4),
                'message' => 'Max length allowed = 4'
            )
        ),
        'semester' => array(
            'semesterRule-1' => array(
                'rule' => 'numeric',
                'message' => 'Enter a valid numbers only.',
                'required' => 'true'
            ),
            'semesterRule-2' => array(
                'rule' => array('maxLength', 2),
                'message' => 'Max length allowed = 2.'
            ),
            'semesterRule-3' => array(
                'rule' => 'notBlank',
                'message' => 'Enter the semester please.'
            )
        ),
        'cvsFile' => array(
            'rule' => 'notBlank',
            'message' => 'Upload a CSV file.'
        ),
        'imagePath' => array(
            'rule' => 'notBlank',
            'message' => 'Upload an image.'
        )
    );

    public function onError() {
        $this->Flash->set("Go back and try again later.");
    }
}
?>