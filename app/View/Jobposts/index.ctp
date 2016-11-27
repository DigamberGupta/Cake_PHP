<h1> Job Posts</h1>
<table>
<tr>
	<th>ID</th>
	<th>Topic Id</th>
</tr>
<?php foreach($jobposts as $jobpost) : ?>
<tr>
	<td><?php echo $this->HTML->link($jobpost['Jobpost']['id'], array('controller' => 'jobposts', 'action' => 'view', $jobpost['Jobpost']['id'])); ?></td>
	<td><?php echo $this->HTML->link($jobpost['Job']['title'], array('controller' => 'jobposts', 'action' => 'view', $jobpost['Jobpost']['id'])); ?></td>
</tr>
<?php endforeach; ?>
<?php unset($jobpost); ?>
</table>