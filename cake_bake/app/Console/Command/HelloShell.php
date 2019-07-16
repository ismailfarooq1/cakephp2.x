<?php        


App::uses('CakeEmail', 'Network/Email');
class HelloShell extends AppShell {
    
    public $tasks = array(
        'Sound'
    ); //using tasks

    public $uses = array(
        'Student'
    );//using models

    public function main() {
        $this->Sound->execute();
    }

    public function hey_there() {
        $this->out("Hey there, " . $this->args[0] . "."); 
        
        $user = $this->Student->find('first', array(
            'conditions' => array('Student.id' => $this->args[0])
        ));
        $this->dispatchShell('Animal', 'create_sound', $this->args[1]); //calling another Shell
        //$this->out($this->params);
    }
    
    public function send_email() {
        $Email = new CakeEmail();
        $Email->config('mailgun');  
        $Email->from(array('ismaeelfarooq53@gmail.com' => 'Hello'));
        $Email->to(array('ikram.diya@gmail.com','ismaeelfarooq53@gmail.com'));
        $Email->subject('Hello friend, this is the subject.');
        $Email->send('How are you? You are an amazing person dude. Keep at it! :))))');
        $this->out('Done');
    }

}
