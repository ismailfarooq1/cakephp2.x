<?php
class DepartmentsController extends AppController {
     public function beforeFilter() {
        parent::beforeFilter();
    }

    public function index() {
        $dep = $this->Department->find('all', array(
            'recursive' => -1
        ));
        $this->set('departments', $dep);
    }

    public function add() {
        if ($this->request->is('post')) {
            if ($this->Department->save($this->request->data)) {
                $this->Flash->set("Department has been added.", array('element' =>'success'));
                $this->redirect(array('action' => 'add'));
            }
        }
    }

    public function delete($id) {
        if ($this->Department->delete($id)){
            $this->Flash->set("Department Deleted", array('element' =>'success'));
            $this->redirect(array('action' => 'index'));
        }
        else {
            $this->Flash->set("This Department has Students");
            $this->redirect(array('action' => 'index'));
        }
        
    }

    public function update($id) {
        $this->set('depdatas', $this->Department->find('first', array(
                            'conditions' => array('Department.id' => $id),
                            'recursive' => -1
                        ))
        );
        $this->Department->id = $id;
        if ($this->request->is('post')) {
            if ($this->Department->save($this->request->data)) {
                $this->Flash->set("Updated");
                $this->redirect(array('action' => 'index'));
            }
        }
    }
}
