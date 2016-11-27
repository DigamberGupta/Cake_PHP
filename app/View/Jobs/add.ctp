<h1> Create Job</h1>
<?php

	echo $this->Form->create('Job');
	echo $this->Form->input('title');
	if(AuthComponent::user('role') == 0) :
	echo $this->Form->select('visible', array('1' => 'Published', '0' => 'Hidden'), array('empty' => false));
	endif;
	echo $this->Form->end('Save Job');

?>