<h1> Create Jobposts</h1>

<?php
	
	echo $this->Form->create('Jobpost');
	//echo $this->Form->input('job_id');
	echo $this->Form->input('body');
	echo $this->Form->end('Create Jobposts');

?>