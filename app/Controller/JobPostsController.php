<?php

App::uses('AppController', 'Controller');
//namespace App\Controller;
//use App\Controller\AppController; ?>

<?php

class JobPostsController extends AppController {
	public $helpers = array('Html', 'Form');

	public $components = array('Flash');

	public function index(){

			 $this->set('JobPosts', $this->paginate($this->Posts));
        	 $this->set('_serialize', ['JobPosts']);

			$this->loadModel('Jobpost');

			if(Authcomponent::user('role') == 1){

				$this->redirect(array('controller' => 'jobs', 'action' => 'index'));

			}

			$data = $this->Jobpost->find('all');
			$this->set('jobposts', $data);

	}


	public function add($id) {

		$this->loadModel('Jobpost');

		if($this->request->is('post')) {

				$this->loadModel('Jobpost');

				$this->Jobpost->create();
				$this->request->data['Jobpost']['job_id'] = $id;
				$this->request->data['Jobpost']['user_id'] = Authcomponent::user('id');
				
				if($this->Jobpost->save($this->request->data)){

					$this->Flash->set('The Jobpost has been created!!');
					$this->redirect('/jobs/view/'.$id);

				}

			}

			$this->set('jobs', $this->Jobpost->Job->find('list'));

	}

	public function view($id){

			$this->loadModel('Jobpost');

			$data = $this->Jobpost->findById($id);
			$this->set('jobpost', $data);

		}


}


?>