<?php
App::uses('AppController', 'Controller');
/**
 * UserDetails Controller
 *
 * @property UserDetail $UserDetail
 * @property PaginatorComponent $Paginator
 */
class UserDetailsController extends AppController {

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
		$this->UserDetail->recursive = 0;
		$this->set('userDetails', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UserDetail->exists($id)) {
			throw new NotFoundException(__('Invalid user detail'));
		}
		$options = array('conditions' => array('UserDetail.' . $this->UserDetail->primaryKey => $id));
		$this->set('userDetail', $this->UserDetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserDetail->create();
			if ($this->UserDetail->save($this->request->data)) {
				$this->Flash->success(__('The user detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user detail could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserDetail->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UserDetail->exists($id)) {
			throw new NotFoundException(__('Invalid user detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UserDetail->save($this->request->data)) {
				$this->Flash->success(__('The user detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserDetail.' . $this->UserDetail->primaryKey => $id));
			$this->request->data = $this->UserDetail->find('first', $options);
		}
		$users = $this->UserDetail->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->UserDetail->id = $id;
		if (!$this->UserDetail->exists()) {
			throw new NotFoundException(__('Invalid user detail'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->UserDetail->delete()) {
			$this->Flash->success(__('The user detail has been deleted.'));
		} else {
			$this->Flash->error(__('The user detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->UserDetail->recursive = 0;
		$this->set('userDetails', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->UserDetail->exists($id)) {
			throw new NotFoundException(__('Invalid user detail'));
		}
		$options = array('conditions' => array('UserDetail.' . $this->UserDetail->primaryKey => $id));
		$this->set('userDetail', $this->UserDetail->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->UserDetail->create();
			if ($this->UserDetail->save($this->request->data)) {
				$this->Flash->success(__('The user detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user detail could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserDetail->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->UserDetail->exists($id)) {
			throw new NotFoundException(__('Invalid user detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UserDetail->save($this->request->data)) {
				$this->Flash->success(__('The user detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserDetail.' . $this->UserDetail->primaryKey => $id));
			$this->request->data = $this->UserDetail->find('first', $options);
		}
		$users = $this->UserDetail->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->UserDetail->id = $id;
		if (!$this->UserDetail->exists()) {
			throw new NotFoundException(__('Invalid user detail'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->UserDetail->delete()) {
			$this->Flash->success(__('The user detail has been deleted.'));
		} else {
			$this->Flash->error(__('The user detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
