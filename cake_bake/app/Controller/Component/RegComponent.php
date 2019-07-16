<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('Component', 'Controller');
class RegComponent extends Component {
    public function view_courses($id) {
       $this->StudentCourse = ClassRegistry::init('StudentCourse');
       $studentdata = $this->StudentCourse->find('all', array(
            'conditions' => array('StudentCourse.student_id' => $id),
            'contain' => array(
                'Course'
            ),
            'recursive' => -1
        ));
        return $studentdata;
    }
}

