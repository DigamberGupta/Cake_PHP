<?php
	App::import('Controller', 'Users');		
?>


<h1><?php  echo $job['Job']['title'];  ?></h1>

<?php echo $this->HTML->link('Create a Job Post under this Job title', array('controller' => 'jobposts', 'action' => 'add', $job['Job']['id'])); ?>
<br>
<?php echo $this->HTML->link('View all Jobs', array('controller' => 'jobs', 'action' => 'index')); ?>

<br>


<!--<pre><?php print_r($job) ?></pre>-->
<table>
<tr>
	<th>Sr. No.</th>
	<th>User</th>
	<th>Job Description</th>
</tr>
<?php
	
	$counter = 1;
	foreach($job['Jobpost'] as $post) {
		$ucontroller = new UsersController;
		$uname = $ucontroller->getUsernameById($post['user_id']);
		echo"<tr><td>".$counter."</td><td>".$uname['User']['username']."</td><td>".$post['body']."</td></td>";
		$counter++;
	}
?>
</table>
