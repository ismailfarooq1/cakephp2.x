<h1>Sign up</h1>

<?php echo $this->Form->postButton('Back' , array('controller' => 'Students', 'action' => 'index'), array('class' => 'btn btn-primary')); ?>

<?php

echo $this->Form->create('User');
echo $this->Form->input('username', array('required' => false));
echo $this->Form->input('password', array('required' => false));
echo $this->Form->end('Submit');

?>