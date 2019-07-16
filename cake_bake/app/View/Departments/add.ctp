<h1> Add a Department </h1>
<?php echo $this->Html->link('All Departments', array('action'=>'index')) ?>
<?php
    echo $this->Form->create('Department');
    echo $this->Form->input('departmentname', array('label'=>'Department Name'));
    echo $this->Form->input('departmenthod', array('label' => 'Department HOD'));
    echo $this->Form->end('Submit');