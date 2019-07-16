<h1> Update Department </h1>
<?php echo $this->Html->link('All Departments', array('action'=>'index')) ?>
<?php
    echo $this->Form->create('Department');
    echo $this->Form->input('departmentname', array('label'=>'Department Name', 'required' => false, 'value' => $depdatas['Department']['departmentname']));
    echo $this->Form->input('departmenthod', array('label' => 'Department HOD', 'required' => false, 'value' => $depdatas['Department']['departmenthod']));
    echo $this->Form->end('Submit');