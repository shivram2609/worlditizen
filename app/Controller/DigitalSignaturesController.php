<?php
App::uses('AppController', 'Controller');
/**
 * DigitalSignatures Controller
 *
 * @property DigitalSignature $DigitalSignature
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class DigitalSignaturesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->DigitalSignature->recursive = 0;
		$this->set('digitalSignatures', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DigitalSignature->exists($id)) {
			throw new NotFoundException(__('Invalid digital signature'));
		}
		$options = array('conditions' => array('DigitalSignature.' . $this->DigitalSignature->primaryKey => $id));
		$this->set('digitalSignature', $this->DigitalSignature->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DigitalSignature->create();
			if ($this->DigitalSignature->save($this->request->data)) {
				$this->Flash->success(__('The digital signature has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The digital signature could not be saved. Please, try again.'));
			}
		}
		$languages = $this->DigitalSignature->Language->find('list');
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
		if (!$this->DigitalSignature->exists($id)) {
			throw new NotFoundException(__('Invalid digital signature'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DigitalSignature->save($this->request->data)) {
				$this->Flash->success(__('The digital signature has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The digital signature could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DigitalSignature.' . $this->DigitalSignature->primaryKey => $id));
			$this->request->data = $this->DigitalSignature->find('first', $options);
		}
		$languages = $this->DigitalSignature->Language->find('list');
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
		$this->DigitalSignature->id = $id;
		if (!$this->DigitalSignature->exists()) {
			throw new NotFoundException(__('Invalid digital signature'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DigitalSignature->delete()) {
			$this->Flash->success(__('The digital signature has been deleted.'));
		} else {
			$this->Flash->error(__('The digital signature could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */	
		public function admin_index($searchval = NULL) {
		$this->bulkactions();
		if ( !empty($searchval) ) {
			$this->set("searchval",$searchval);
			$this->conditions = array("Language.name like"=> "%".$searchval."%");
		}
		if ( $this->request->is("post") ) {
			if ( !empty($this->data['DigitalSignature']['searchval']) ) {
				$this->redirect(SITE_LINK."ad-digitalsignatures/".$this->data['DigitalSignature']['searchval']);
			} else {
				$this->redirect(SITE_LINK."ad-digitalsignatures/");
			}
		}
		$this->DigitalSignature->recursive = 0;
		$this->set('digitalSignatures', $this->Paginator->paginate($this->conditions));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->DigitalSignature->exists($id)) {
			throw new NotFoundException(__('Invalid digital signature'));
		}
		$options = array('conditions' => array('DigitalSignature.' . $this->DigitalSignature->primaryKey => $id));
		$this->set('digitalSignature', $this->DigitalSignature->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->DigitalSignature->create();
			if ($this->DigitalSignature->save($this->request->data)) {
				$this->Flash->success(__('The digital signature has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The digital signature could not be saved. Please, try again.'));
			}
		}
		$languages = $this->DigitalSignature->Language->find('list');
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
		if (!$this->DigitalSignature->exists($id)) {
			throw new NotFoundException(__('Invalid digital signature'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DigitalSignature->save($this->request->data)) {
				$this->Flash->success(__('The digital signature has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The digital signature could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DigitalSignature.' . $this->DigitalSignature->primaryKey => $id));
			$this->request->data = $this->DigitalSignature->find('first', $options);
		}
		$languages = $this->DigitalSignature->Language->find('list');
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
		$this->DigitalSignature->id = $id;
		if (!$this->DigitalSignature->exists()) {
			throw new NotFoundException(__('Invalid digital signature'));
		}
		//$this->request->allowMethod('post', 'delete');
		if ($this->DigitalSignature->delete()) {
			$this->Flash->success(__('The digital signature has been deleted.'));
		} else {
			$this->Flash->error(__('The digital signature could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
