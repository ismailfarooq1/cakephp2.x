<h1> All Courses </h1>
<h3> <?php echo $this->Html->link('<-BACK', array('controller' => 'Students', 'action' => 'index')); ?> </h3>
<?php echo $this->Html->link('Add a Course', array('action' => 'add'));  ?>
<table  class="table table-hover table-striped table-sm table-bordered">
    <thead>
        <tr>
            <th class="abc">Course Name</th>
            <th class="abc">Course Teacher</th>
            <th class="abc">Delete</th>
            <th class="abc">Update</th>
        </tr>
    </thead>
<?php foreach ($courses as $course): ?>
    <tbody>
        <tr> 
            <td><?php echo $course['Course']['coursename']; ?></td> 
            <td><?php echo $course['Course']['courseteacher']; ?></td>
            <td class="abc"><?php echo $this->Form->postButton('Delete', array('action' => 'delete', $course['Course']['id']), array('class' => 'btn btn-outline-danger')); ?></td>
            <td class="abc"><?php echo $this->Form->postButton('Update', array('action' => 'update', $course['Course']['id']), array('class' => 'btn btn-outline-danger')); ?></td>
        </tr>
    </tbody>
<?php endforeach; ?>
</table>