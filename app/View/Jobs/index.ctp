<h1> Jobs </h1>

<?php echo $this->HTML->link('Post a new Job', array('controller' => 'jobs', 'action' => 'add')); ?>
<br>
<?php 

	if(AuthComponent::user()){

		echo $this->HTML->link('Logout', array('controller' => 'users', 'action' => 'logout')); 

	}else{

		echo $this->HTML->link('Login', array('controller' => 'users', 'action' => 'login')).' or '.$this->HTML->link('Register', array('controller' => 'users', 'action' => 'add')); 

	}

?>

<table>
<tr>
	<th>Title</th>
	<th>User Id</th>
	<th>Created</th>
	<th>Modified</th>
	<?php if(AuthComponent::user('role') == 0) : ?>
		<th>Published</th>
		<th>Edit</th>
		<th>Delete</th>
	<?php endif; ?>
</tr>
<?php foreach($jobs as $job) : ?>
<tr>

<?php if(AuthComponent::user('role') == 0) : ?>

	<td><?php echo $this->HTML->link($job['Job']['title'], array('controller' => 'jobs', 'action' => 'view', $job['Job']['id'])); ?></td>
	<td><?php echo $job['User']['username']; ?></td>
	<td><?php echo $job['Job']['created']; ?></td>
	<td><?php echo $job['Job']['modified']; ?></td>
	<?php if(AuthComponent::user('role') == 0) : ?>
		<td><?php echo $job['Job']['visible']; ?></td>
		<td><?php echo $this->HTML->link('Edit', array('controller' => 'jobs', 'action' => 'edit', $job['Job']['id'])); ?></td>
		<td><?php echo $this->Form->postLink('Delete', array('controller' => 'jobs', 'action' => 'delete', $job['Job']['id']), array('confirm' => 'Are you sure you want to delete this job?')); ?></td>
	<?php endif; ?>
</tr>

<?php endif; ?>
<?php if(AuthComponent::user('role') == 1): ?>
<?php if($job['Job']['visible'] == 1) : ?>
	<td><?php echo $this->HTML->link($job['Job']['title'], array('controller' => 'jobs', 'action' => 'view', $job['Job']['id'])); ?></td>
	<td><?php echo $job['User']['username']; ?></td>
	<td><?php echo $job['Job']['created']; ?></td>
	<td><?php echo $job['Job']['modified']; ?></td>
	<?php if(AuthComponent::user('role') == 0) : ?>
		<td><?php echo $job['Job']['visible']; ?></td>
		<td><?php echo $this->HTML->link('Edit', array('controller' => 'jobs', 'action' => 'edit', $job['Job']['id'])); ?></td>
		<td><?php echo $this->Form->postLink('Delete', array('controller' => 'jobs', 'action' => 'delete', $job['Job']['id']), array('confirm' => 'Are you sure you want to delete this job?')); ?></td>
	<?php endif; ?>
</tr>
<?php endif; ?>
<?php endif; ?>
<?php endforeach; ?>
<?php unset($job); ?>
</table>