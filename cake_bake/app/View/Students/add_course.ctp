<h1>Add course</h1>
<h2><?php echo $this->Html->link('<-BACK', array('action' => 'index') ); ?></h2>
<?php echo $this->Form->create('StudentCourse', array('enctype'=>'multipart/form-data')); ?> 
<h4> Select a course. </h4>  
<?php
echo $this->Form->select('course_id', array( 'SUBJECTS' => $coursedatas, ));
echo $this->Form->hidden('student_id', array('type' => 'text', 'value' => $studentid));
echo $this->Form->end('Submit');

?>

<h1>Registered Courses<b> <?php //echo $studentdatas['Student']['name']; ?></b></h1>
<table  class="table table-hover table-striped table-sm table-bordered">
    <thead>
        <tr>
            <th class="abc">Course ID </th>
            <th class="abc">Course Name</th>
        </tr>
    </thead>
  <?php foreach ($studentdatas as $studentdata): ?>
    <tbody>
        <tr>
            <td class = "abc"> <?php echo $studentdata['StudentCourse']['course_id']?></td>
            <td class = "abc"> <?php echo $studentdata['Course']['coursename']; ?></td>
        </tr>
    </tbody>
<?php endforeach; ?>
</table>