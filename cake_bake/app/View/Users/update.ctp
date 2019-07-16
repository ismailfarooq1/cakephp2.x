<h1>Change your password</h1>
<?php echo $this->Form->postButton('Back' , array('controller' => 'Students', 'action' => 'index'), array('class' => 'btn btn-primary')); ?>

<?php
$a = $this->Session->read();
echo $this->Form->create('User');
echo $this->Form->input('password');
echo $this->Form->input('username', array('type' => 'hidden', 'value' => $a['Auth']['User']['username'] ));
echo $this->Form->end('Submit');

?>