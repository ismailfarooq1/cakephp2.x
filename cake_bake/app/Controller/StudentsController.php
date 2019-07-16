<?php
class StudentsController extends AppController {
    
    public $components = array(
        'Reg'
        );
    
    public $uses = array(
        'Student',
        'StudentCourse',
        'Course',
        'Department',
        'User',
    );
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Cookie->name = 'user_id';
        $this->Cookie->time = 3600;
        $this->Cookie->path = '/students/';
        $this->Cookie->key = 'qSI232qs*&sXOw!adre@34SAv!@*(XSL#$%)asGb$@11~_+!@#HKis~#^';
        $this->Cookie->type('aes');
    }

    public function index() { 
        $a = $this->Session->read();
        $stu = $this->Student->find('all', array(
            'contain' => array(
                'Department'
            ),
            'recursive' => -1
        ));
        $this->Cookie->write('User',$a, false);
        $this->set(array('students' => $stu, 'userdata' => $a));
    }

    public function delete($id) {
        $this->Student->delete($id);
        $this->Flash->set("Student Deleted!");
        $this->redirect(array('action' => 'index'));
    }

    public function delete_registered($id) {
        $studentdata = $this->StudentCourse->find('first', array(
            'conditions' => array('StudentCourse.id' => $id),
            'contain' => array(
                'Student'
            ),
            'recursive' => -1
        ));
        $idp = $studentdata['StudentCourse']['student_id'];
        $this->StudentCourse->delete($studentdata['StudentCourse']);
        $this->Flash->set('Course Deleted for ' . $studentdata['Student']['name']);
        $this->redirect(array('action' => 'view_registered', $idp));
    }

    public function add() {
        $data = $this->Department->find('list', array(
            'fields' => array('departmentname'),
            'contain' => array(
                'Department'
            ),
            'recursive' => -1
                )
        );
        $this->set('depdata', $data);
        if ($this->request->is('post')) {
            if (!empty($this->request->data['Student']['cvsFile'])) {
                $cvs = $this->request->data['Student']['cvsFile'];
                $ext = substr(strtolower(strrchr($cvs['name'], '.')), 1);
                if ($this->Student->validate) {
                    move_uploaded_file($cvs['tmp_name'], 'files/' . $cvs['name']);
                    $this->request->data['Student']['cvsFile'] = $cvs['name'];
                }
            }
            if (!empty($this->request->data['Student']['imagePath'])) {
                $file = $this->request->data['Student']['imagePath'];
                move_uploaded_file($file['tmp_name'], 'img/' . $file['name']);
                if ($file['name'] != "") {
                    list($old_width, $old_height) = getimagesize(WWW_ROOT . "img/" . $file['name']);
                    $new_width = 50;
                    $new_height = 50;
                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                    if ($ext == 'png') {

                        $new_image = imagecreatetruecolor($new_width, $new_height);
                        $old_image = imagecreatefrompng(WWW_ROOT . "img/" . $file['name']);
                        imagecopyresampled($new_image, $old_image, 0, 0, 0, 1, $new_width, $new_height, $old_width, $old_height);
                        imagepng($new_image, WWW_ROOT . "img/thumbnail/" . $file['name'], 3);
                    } 
                    elseif ($ext == 'jpg') {
                        $new_image = imagecreatetruecolor($new_width, $new_height);
                        $old_image = imagecreatefromjpeg(WWW_ROOT . "img/" . $file['name']);
                        imagecopyresampled($new_image, $old_image, 0, 0, 1, 1, $new_width, $new_height, $old_width, $old_height);
                        imagejpeg($new_image, WWW_ROOT . "img/thumbnail/" . $file['name'], 30);
                    }
                    $this->request->data['Student']['imagePath'] = 'thumbnail/' . $file['name'];
                }
                if ($this->Student->save($this->request->data)) {
                    $this->Flash->set("Student has been added.", array('element' =>'success'));
                    $this->redirect(array('action' => 'add'));
                }
            }
        }
    }

    public function update($id) {
        $data = $this->Department->find('list', array(
            'fields' => array('departmentname'),
            'recursive' => -1
        ));
        $a = $this->Student->find('first', array(
            'conditions' => array('Student.id' => $id),
            'contain' => array(
                'Department'
            ),
            'recursive' => -1
        ));
        $this->set(array('student' => $a, 'depdata' => $data));
        $this->Student->id = $id;
        if ($this->request->is('post')) {
            if ($this->Student->exists()) {
                if (!empty($this->request->data['Student']['cvsFile'])) {
                    $cvs = $this->request->data['Student']['cvsFile'];
                    $ext = substr(strtolower(strrchr($cvs['name'], '.')), 1);
                    $valid_ext = array('csv');
                    if (in_array($ext, $valid_ext)) {
                        move_uploaded_file($cvs['tmp_name'], 'files/' . $cvs['name']);
                        $this->request->data['Student']['cvsFile'] = $cvs['name'];
                    }
                }
            } 
            else {
                $this->request->data['Student']['cvsFile'] = $a['Student']['cvsFile'];
            }
            if (!empty($this->request->data['Student']['imagePath'])) {
                $file = $this->request->data['Student']['imagePath'];
                move_uploaded_file($file['tmp_name'], 'img/' . $file['name']);
                if ($file['name'] == "") {
                } 
                else {
                    list($old_width, $old_height) = getimagesize(WWW_ROOT . "img/" . $file['name']);
                    $new_width = 50;
                    $new_height = 50;
                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                    if ($ext == 'png') {
                        $new_image = imagecreatetruecolor($new_width, $new_height);
                        $old_image = imagecreatefrompng(WWW_ROOT . "img/" . $file['name']);
                        imagecopyresampled($new_image, $old_image, 0, 0, 0, 1, $new_width, $new_height, $old_width, $old_height);
                        imagepng($new_image, WWW_ROOT . "img/thumbnail/" . $file['name'], 3);
                    }
                    if ($ext == 'jpg') {
                        $new_image = imagecreatetruecolor($new_width, $new_height);
                        $old_image = imagecreatefromjpeg(WWW_ROOT . "img/" . $file['name']);
                        imagecopyresampled($new_image, $old_image, 0, 0, 0, 1, $new_width, $new_height, $old_width, $old_height);
                        imagejpeg($new_image, WWW_ROOT . "img/thumbnail/" . $file['name'], 30);
                    }
                    $this->request->data['Student']['imagePath'] = 'thumbnail/' . $file['name'];
                }
                if ($this->Student->save($this->request->data)) {
                    $this->Flash->set("Student updated.", array('element' =>'success'));
                    $this->redirect(array('action' => 'index'));
                }
            }
        }
    }

    public function display_cvs($name) {
        $path = 'webroot\files/' . $name;
        $this->autoRender = false;
        $this->response->file($path, array('download' => true));
    }

    public function add_course($id) {
        $sc = $this->Course->find('list', array(
            'fields' => 'coursename',
            'recursive' => -1
        ));
        $studentdata = $this->Reg->view_courses($id);
        $this->set('studentdatas', $studentdata);
        $this->set(array('studentid' => $id, 'coursedatas' => $sc));
        if ($this->request->is('post')) {
            if ($this->Student->StudentCourse->save($this->request->data)) {
                $this->Flash->set("Course added!", array('element' =>'success'));
                $this->redirect(array('action' => 'add_course', $id));
            }
            else {
                $this->Flash->set("This course has already been added.");
            }
        } 
    }

    public function view_registered($id) {
        $studentdata = $this->Reg->view_courses($id);
        $this->set('studentdatas', $studentdata);
    }
}
