<h1>Update Student</h1>
<h2> <?php echo $this->Html->link('<- Back', array('action'=>'index')); ?>  </h2>
<?php
echo $this->Form->create('Student',array('enctype'=>'multipart/form-data' ));
echo $this->Form->input('name', array('value' => $student['Student']['name'] , 'required' => false));
echo $this->Form->input('cgpa', array('value' => $student['Student']['cgpa'], 'required' => false));
echo $this->Form->input('semester', array('value' => $student['Student']['semester'], 'required' => false));
echo "Department";
echo $this->Form->select('department_id', array('Options' => $depdata, 'selected' => "*".$student['Department']['departmentname']), array('class' => 'dropdown-header'));
echo $this->Form->input('cvsFile', array('type' => 'file', 'accept' => '.csv', 'required' => false));
echo "<h3 style = 'margin-left:22px'>" . $student['Student']['cvsFile'] . "</h3>";
echo $this->Form->input('imagePath', array('type'=>'file', 'accept'=>'image/*', 'required' => false));
echo $this->Html->image($student['Student']['imagePath'], array('alt' => 'Ismail')); 
echo $this->Form->end('Submit');