<?php

	App::uses('AppController', 'Controller');
	//namespace app\Controller;
	//use app\Controller\AppController;
	

	class JobsController extends AppController {

		public $components = array('Flash');

		public function beforeFilter(){

			$this->Auth->allow('index');

		}

		
		public function index(){

			$data = $this->Job->find('all');
			$this->set('jobs', $data);
			//print_r($data);

		}




		/* This method adds the data to Jobs table and redirects users to index page */
		public function add(){

			if($this->request->is('post')) {

				$this->Job->create();

				if(AuthComponent::user('role') == 1){
					$this->request->data['Job']['visible'] = 0;
				}	
								
				$this->request->data['Job']['user_id'] = Authcomponent::user('id');

				if($this->Job->save($this->request->data)){

					$this->Flash->set('The Job has been created!!');
					$this->redirect('index');

				}

			}

		}


		public function view($id){

			$data = $this->Job->findById($id);
			$this->set('job', $data);

		}

		public function edit($id){

			if(AuthComponent::user('role') == 1){
					$this->redirect('index');
			}

			$data = $this->Job->findById($id);

			if($this->request->is(array('post','put'))){
				$this->Job->id = $id;
				if($this->Job->save($this->request->data)){
					$this->Flash->set('The Job has been Edited!!');
					$this->redirect('index');	
				}

			}

			$this->request->data = $data;

		}

		public function delete($id) {

			if(AuthComponent::user('role') == 1){
					$this->redirect('index');
			}

			$this->Job->id = $id;

			if($this->request->is(array('post','put'))){
				if($this->Job->delete()){
					$this->Flash->set('The Job has been Deleted!!');
					$this->redirect('index');	
				}

			}


		}

	}


?>