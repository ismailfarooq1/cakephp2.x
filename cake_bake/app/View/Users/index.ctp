<h1>Administrators</h1>
<h3> <?php echo $this->Form->postButton('BACK', array('controller' => 'Students', 'action' => 'index'), array('class' => 'btn btn-primary')); ?> </h3>
<table  class="table table-hover table-striped table-sm table-bordered">
  <thead>
    <tr>
      <th class="abc">UserID</th>
      <th class="abc">Username</th>
    </tr>
  </thead>
<?php foreach ($users as $user):?>
  <tbody>
    <tr>
        <td class = "abc"> <?php echo $user['User']['id']?></td>
        <td class = "abc"> <?php echo $user['User']['username']?></td>
    </tr>
   </tbody>   
<?php endforeach; ?>
<?php unset($users); ?>
</table>



