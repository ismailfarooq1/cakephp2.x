<?php
class CoursesController extends AppController {
     public function beforeFilter() {
        parent::beforeFilter();
    }
    
    public function index() {
        $course = $this->Course->find('all', array(
            'recursive' => -1
        ));
        $this->set('courses', $course);
    }

    public function add() {
        if ($this->request->is('post')) {
            if ($this->Course->save($this->request->data)) {
                $this->Flash->set("Course added.", array('element' =>'success'));
                $this->redirect(array('action' => 'add'));
            }
        }
    }

    public function delete($id) {
        $this->Course->delete($id);
        $this->Flash->set('Course Deleted');
        $this->redirect(array('action' => 'index'));
    }

    public function update($id) {
        $data = $this->Course->find('first', array(
            'conditions' => array('Course.id' => $id),
            'recursive' => -1
        ));
        $this->set('datas', $data);
        $this->Course->id = $id;
        if ($this->request->is('post')) {
            if ($this->Course->save($this->request->data)) {
                $this->Flash->set('Course Updated', array('element' =>'success'));
                $this->redirect(array('action' => 'index'));
            }
        }
    }
}
