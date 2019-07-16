<h1> All Departments</h1>
<h3> <?php echo $this->Form->postButton('BACK', array('controller' => 'Students', 'action' => 'index'), array('class' => 'btn btn-primary')); ?> </h3>
<?php echo $this->Html->link('Add a Department', array('action' => 'add'));  ?>
<table  class="table table-hover table-striped table-sm table-bordered">
  <thead>
    <tr>
      <th class="abc">Department ID</th>
      <th class="abc">Department Name</th>
      <th class="abc">Department HOD</th>
      <th class="abc">Delete</th>
      <th class="abc">Update</th>
    </tr>
  </thead>
<?php foreach ($departments as $department): ?>
  <tbody>
  <tr> 
      <td><?php echo $department['Department']['id'] ; ?></td>
      <td><?php echo $department['Department']['departmentname']; ?></td>
      <td><?php echo $department['Department']['departmenthod']; ?></td>
      <td class="abc"><?php echo $this->Form->postButton('Delete', array('action' => 'delete', $department['Department']['id']), array( 'class' => 'btn btn-outline-danger' )); ?></td>
      <td class="abc"><?php echo $this->Form->postButton('Update', array('action' => 'update', $department['Department']['id']), array( 'class' => 'btn btn-outline-danger' )); ?></td>
  </tr>
  </tbody>
<?php endforeach; ?>
