<h1>View registered Courses for <b> <?php //echo $studentdatas['Student']['name']; ?></b></h1>
<h2><?php echo $this->Html->link('<- BACK', array('action' => 'index')) ?></h2>
<table  class="table table-hover table-striped table-sm table-bordered">
    <thead>
        <tr>
            <th class="abc">Course ID </th>
            <th class="abc">Course Name</th>
            <th class="abc">Delete course</th>
        </tr>
    </thead>
  <?php foreach ($studentdatas as $studentdata): ?>
    <tbody>
        <tr>
            <td class = "abc"> <?php echo $studentdata['StudentCourse']['course_id']?></td>
            <td class = "abc"> <?php echo $studentdata['Course']['coursename']; ?></td>
            <td class = "abc"> <?php echo $this->Html->link('Delete', array('action' => 'delete_registered', $studentdata['StudentCourse']['id']));?></td>
        </tr>
    </tbody>
<?php endforeach; ?>
</table>