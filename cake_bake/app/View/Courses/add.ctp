<h1>Add course</h1>
<?php $this->Html->link('<-BACK', '') ?>
<?php echo $this->Html->link('All courses', array('action'=> 'index')); 
echo $this->Form->create('Course');
echo $this->Form->input('coursename', array('label' => 'Course name', 'required' => false));
echo $this->Form->input('courseteacher', array('label' => 'Course Teacher', 'required' => false));
echo $this->Form->end('Submit');
?>

