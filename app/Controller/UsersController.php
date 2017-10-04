<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	function beforefilter() {
		parent::beforefilter();
		$this->Auth->allow("login");
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}
	
	
	public function login() {
		//$this->Auth->password("123456");
		if ( $this->request->is("post") ) {
			if ( $this->Auth->login() ) {
				$user = $this->Session->read("Auth");
				$this->getUserDetail();
				if ( $user['User']['is_admin'] ) {
					$this->redirect("/manager");
				} else {
					$this->redirect("/dashboard");
				}
			} else {
				die("error");
			}
		}
	}
	
	public function logout() {
		$this->Auth->logout();
		$this->redirect("/login");
	}
	
	function admin_dashboard() {
		//die("here");
	}
	
	
	
	public function changepassword() {
        $this->__processChangepassword();
    }
    
    	/*
	 * @function name	: changepassword
	 * @purpose			: display form of change password and also performs password change functionlity
	 * @arguments		: none
	 * @return			: none
	 * @description		: NA
	*/
	public function admin_changepassword() {					
            $this->__processChangepassword();
	}
	/* end of function */
	function __processChangepassword() {
		//$this->userInfo();
		if (!empty($this->data)) {
			$data = $this->data;
			$data['User']['encOldPassword'] = $this->Auth->password($data['User']['currentpassword']);
			$this->User->set($data);
			if ( $this->User->validates() ) {
				$password = $this->Auth->password($this->data['User']['currentpassword']);
				$user = $this->User->find("first",array("conditions"=>array("User.id"=>$this->Session->read('Auth.User.id'),'User.password'=>$password),'recursive'=>-1));				
				$new_pass =$this->Auth->password($this->data['User']['newpassword']);	
				if (empty($user)) {
					$this->Session->setFlash('Current password is not correct.');	
				}
				elseif(empty($this->data['User']['newpassword']) || empty($this->data['User']['confirmpassword'])) {
					$this->Session->setFlash('New and confirm password do not match.');
				} elseif($password == $new_pass){
					$this->Session->setFlash('New password can not be same as current password.');
				} elseif($this->data['User']['newpassword'] != $this->data['User']['confirmpassword']) {
					$this->Session->setFlash('New and confirm password do not match.', 'default');
				} else {				
					$data['User']['password'] =  $new_pass;
					$data['User']['id'] = $this->Session->read("Auth.User.id");
					$tmpData['id'] = $this->Session->read("Auth.User.id");
					$tmpData['password'] =  $new_pass;
					$this->User->create();
					$this->User->id = 1;	
					$this->User->saveAll($tmpData,array("validate"=>false));
					$this->Session->setFlash('Password has been updated successfully.', 'default',array("class"=>"success_message"));			
				}
			}
		}
	}
	

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
