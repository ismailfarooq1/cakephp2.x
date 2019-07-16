<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SoundTask extends Shell {
    
    public function execute() {
        $this->out("This is SoundTask execute function.");
    }
    
    public function sound_one() {
        $this->out("MEOW.MEOW");
    } 
    
    public function sound_two() {
        $this->out("BARK.BARK");
    }
    
    public function sound_three() {
        $this->out("THIRD.THIRD");
    } 
}