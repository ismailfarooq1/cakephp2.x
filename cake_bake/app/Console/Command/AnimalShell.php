<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AnimalShell extends Shell {
    
    public $tasks = array(
        'Sound'
    );


    public function main() {
        $this->out("Hello i'm main function in ANIMAL.");
    }
    
    public function create_sound() {
        $type = $this->args[0];
        if ($type == 1) {
            $this->Sound->sound_one();
        }
        elseif ($type == 3) {
            $this->Sound->sound_three();
        }
        else {
            $this->Sound->sound_two();
        }
        
        $this->out("Done");
    }
    
    
}
