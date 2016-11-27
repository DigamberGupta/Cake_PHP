<h1> Edit Job</h1>
<?php

	echo $this->Form->create('Job');
	//echo $this->Form->input('user_id');
	echo $this->Form->input('title');
	echo $this->Form->input('visible');
	echo $this->Form->end('Edit Job');

?>