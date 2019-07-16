<h1>Add new students</h1>
<h2> <?php echo $this->Html->link('All Students', array('action'=>'index')); ?>  </h2>
<?php
$path = '\app\webroot\img';
echo $this->Form->create('Student',array('enctype'=>'multipart/form-data' ));
echo $this->Form->input('name',array('required' => false));
echo $this->Form->input('cgpa',array('required' => false));
echo "Department";
echo $this->Form->select('department_id', array('Options' => $depdata), array('class' => 'dropdown-header'));
echo $this->Form->input('semester',array('required' => false));
echo $this->Form->input('cvsFile', array('type' => 'file', 'accept' => '.csv','required' => false ));
echo $this->Form->input('imagePath', array('type'=>'file', 'accept' => 'image/*','required' =>false ));
echo $this->Form->end('Submit');

 