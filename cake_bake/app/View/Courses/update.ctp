<h1> Update Courses </h1>
<?php echo $this->Html->link('All Courses', array('action'=>'index')) ?>
<?php
    echo $this->Form->create('Course');
    echo $this->Form->input('coursename', array('label'=>'Course Name', 'required' => false, 'value' => $datas['Course']['coursename']));
    echo $this->Form->input('courseteacher', array('label' => 'Course Teacher', 'required' => false, 'value' => $datas['Course']['courseteacher']));
    echo $this->Form->end('Submit');
 