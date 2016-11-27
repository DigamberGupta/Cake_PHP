<?php
	
App::uses('AppModel', 'Model');

class Jobpost extends AppModel {
	//var $name = 'Jobpost';

	public $belongsTo = 'Job';

}

?>