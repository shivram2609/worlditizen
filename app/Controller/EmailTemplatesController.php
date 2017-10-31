<?php
App::uses('AppController', 'Controller');
/**
 * EmailTemplates Controller
 *
 * @property EmailTemplate $EmailTemplate
 * @property PaginatorComponent $Paginator
 */
class EmailTemplatesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EmailTemplate->recursive = 0;
		$this->set('emailTemplates', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EmailTemplate->exists($id)) {
			throw new NotFoundException(__('Invalid email template'));
		}
		$options = array('conditions' => array('EmailTemplate.' . $this->EmailTemplate->primaryKey => $id));
		$this->set('emailTemplate', $this->EmailTemplate->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EmailTemplate->create();
			if ($this->EmailTemplate->save($this->request->data)) {
				$this->Flash->success(__('The email template has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The email template could not be saved. Please, try again.'));
			}
		}
		$languages = $this->EmailTemplate->Language->find('list');
		$this->set(compact('languages'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EmailTemplate->exists($id)) {
			throw new NotFoundException(__('Invalid email template'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EmailTemplate->save($this->request->data)) {
				$this->Flash->success(__('The email template has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The email template could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EmailTemplate.' . $this->EmailTemplate->primaryKey => $id));
			$this->request->data = $this->EmailTemplate->find('first', $options);
		}
		$languages = $this->EmailTemplate->Language->find('list');
		$this->set(compact('languages'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->EmailTemplate->id = $id;
		if (!$this->EmailTemplate->exists()) {
			throw new NotFoundException(__('Invalid email template'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EmailTemplate->delete()) {
			$this->Flash->success(__('The email template has been deleted.'));
		} else {
			$this->Flash->error(__('The email template could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index($searchval = null) {
		$this->bulkactions();
		if ( !empty($searchval) ) {
			$this->set("searchval",$searchval);
			
			$this->conditions = array("Language.name like"=> "%".$searchval."%");
			
		}
		if ( $this->request->is("post") ) {
			
		
			if ( !empty($this->data['EmailTemplate']['searchval']) )
				 {
			
				$this->redirect(SITE_LINK."ad-emailtemplates/".$this->data['EmailTemplate']['searchval']);
				
			} 
			else { 
				$this->redirect(SITE_LINK."ad-emailtemplates/");
			}
		}
		
		$this->EmailTemplate->recursive = 0;
		$this->set('emailTemplates' , $this->Paginator->paginate($this->conditions));
	}



/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->EmailTemplate->exists($id)) {
			throw new NotFoundException(__('Invalid email template'));
		}
		$options = array('conditions' => array('EmailTemplate.' . $this->EmailTemplate->primaryKey => $id));
		$this->set('emailTemplate', $this->EmailTemplate->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			//pr($this->request->data);
			//die;
			$this->EmailTemplate->create();
			if ($this->EmailTemplate->save($this->request->data)) {
				$this->Flash->success(__('The email template has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The email template could not be saved. Please, try again.'));
			}
		}
		$languages = $this->EmailTemplate->Language->find('list');
		$this->set(compact('languages'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->EmailTemplate->exists($id)) {
			throw new NotFoundException(__('Invalid email template'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EmailTemplate->save($this->request->data)) {
				$this->Flash->success(__('The email template has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The email template could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EmailTemplate.' . $this->EmailTemplate->primaryKey => $id));
			$this->request->data = $this->EmailTemplate->find('first', $options);
		}
		$languages = $this->EmailTemplate->Language->find('list');
		$this->set(compact('languages'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->EmailTemplate->id = $id;
		if (!$this->EmailTemplate->exists()) {
			throw new NotFoundException(__('Invalid email template'));
		}
		//$this->request->allowMethod('post', 'delete');
		if ($this->EmailTemplate->delete()) {
			$this->Flash->success(__('The email template has been deleted.'));
		} else {
			$this->Flash->error(__('The email template could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
