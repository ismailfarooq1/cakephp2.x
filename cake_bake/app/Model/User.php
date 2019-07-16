<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
    
    public $validate = array(
        'username' => array(
            'rule' => 'isUnique',
            'message' => 'Enter Unique Username'
        ),
        
        'password' => array(
            'rule' => 'notBlank',
            'message' => 'Enter a password.'
        )
    );
    
    
    public function beforeSave($options = array()) {
        parent::beforeSave($options);
        if (!empty($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }
    
   
}