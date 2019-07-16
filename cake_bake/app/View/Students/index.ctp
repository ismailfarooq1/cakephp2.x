<div class="row">
    <div class="col-md-7">
        <h1> <?php echo $userdata['Auth']['User']['username'] ?> </h1>
    </div>
    <div class="col-md-3">
        <?php echo $this->Form->postButton('Change Password', array('controller' => 'Users', 'action' => 'update'), array('class' => 'btn btn-primary abc4')) ?>
    </div>
    <div class="col-md-1">
        <?php echo $this->Form->postButton('Logout', array('controller' => 'Users', 'action' => 'logout'), array('class' => 'btn btn-primary abc4')) ?>
    </div>
</div>

<h2>All Students</h2>
<button class="btn btn-outline-dark abc3"><?php echo $this->Html->link("Add User", array('action' => 'add')); ?></button>
<button class="btn btn-outline-dark abc3"><?php echo $this->Html->link( "View Departments",   array('controller'=>'Departments' ,'action'=>'index') );?></button>
<button class="btn btn-outline-dark abc3"><?php echo $this->Html->link( "View Courses", array('controller' => 'Courses', 'action' =>'index')); ?></button>
<table  class="table table-hover table-striped table-sm table-bordered">
  <thead>
    <tr>
      <th class="abc">Name</th>
      <th class="abc">CGPA</th>
      <th class="abc">Semester</th>
      <th class="abc">Dep name</th>
      <th class="abc">Picture</th>
      <th class="abc">CSV File</th>
      <th class="abc">Delete</th>
      <th class="abc">Update</th>
      <th class="abc">Add course</th>
      <th class="abc">Registered course</th>
    </tr>
  </thead>
<?php foreach ($students as $student):?>
  <tbody>
    <tr>
        <td class = "abc"> <?php echo $student['Student']['name']?></td>
        <td class = "abc"> <?php echo $student['Student']['cgpa']?></td>
        <td class = "abc"> <?php echo $student['Student']['semester']?></td>
        <td class = "abc"> <?php echo $student['Department']['departmentname']?></td>
        <td class = "abc"> <?php echo $this->Html->image($student['Student']['imagePath'], array('alt' => 'Ismail')); ?> </td>
        <td class = "abc"> <?php echo $this->Form->postButton("Download", array('action' => 'display_cvs', $student['Student']['cvsFile']), array('class' => 'btn btn-outline-danger')); ?> </td>
        <td class = "abc"> <?php echo $this->Form->postButton( "Delete", array('action' => 'delete', $student['Student']['id']),array('class' => 'btn btn-outline-dark')) ;?></button></td>
        <td class = "abc"> <?php echo $this->Form->postButton( "Update", array('action'=>'update', $student['Student']['id']), array('class' => 'btn btn-outline-danger')) ;?></td>
        <td class = "abc"> <?php echo $this->Form->postButton( "Add Course", array('action'=>'add_course', $student['Student']['id']), array('class' => 'btn btn-outline-danger')) ;?></td>
        <td class = "abc"> <?php echo $this->Form->postButton( "View", array('action'=>'view_registered', $student['Student']['id']), array('class' => 'btn btn-outline-danger')) ;?></td>
    </tr>
   </tbody>   
<?php endforeach; ?>
<?php unset($student); ?>
</table>

<div class="row">
    <div class="col-md-3">
        <?php echo $this->Form->postButton('Add new Administrator', array('controller' => 'Users', 'action' => 'add'), array('class' => 'btn btn-primary')); ?>
    </div>
    <div class="col-md-2">
        <?php echo $this->Form->postButton('View Administrators', array('controller' => 'Users', 'action' => 'index'), array('class' => 'btn btn-primary')); ?>
    </div>
</div>

