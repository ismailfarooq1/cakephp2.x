<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');

class UsersController extends AppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login');
    }

    public function index() {
        $user = $this->User->find('all', array(
            'recursive' => -1,
        ));
        $this->set(array('users' => $user));
    }

    public function login() {
        if ($this->User->validates()) {
            if ( $this->request->is('post') ) {
                if ( $this->Auth->login() ) {
                    $this->redirect($this->Auth->redirectUrl());
                }
                else {
                    $this->Flash->set('Enter a correct username or password.');
                }
            }
        }
        else {
            echo "ERROR";
        }
    }
    
    public function add() {
        if ($this->request->is('post')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->set('Admin added');
                $this->redirect(array('controller' => 'Students','action' => 'index'));
            }
        }
    }
    
    public function logout() {
        $this->Session->destroy();
        return $this->redirect($this->Auth->logout());
    }
    
    public function update() {
        
        $a = $this->Session->read();
        $this->User->id = $a['Auth']['User']['id'];
        if($this->User->save($this->request->data)) {
            $this->Flash->set('Password Changed');
            $this->redirect(array('controller' => 'Students','action' => 'index'));
        }
        
    }
}