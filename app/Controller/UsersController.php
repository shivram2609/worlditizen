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
		$this->Auth->allow("login","ready_to_signin","signup","forgot_password","reset_password","confirmlink");
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
	
	public function ready_to_signin(){
	
	
	}
	
	function dashboard() {
		$this->layout = "user";
		if ( $this->request->is("post") ) {
			$requestData = $this->request->data;
			//pr($requestData);
			//die;
		    if ($this->User->UserDetail->save($this->request->data)){
		     $this->Session->setFlash(__("Your account Details has been edited."), 'default', array("class"=>"success_message"));
			} else {
				$this->Session->setFlash(__("Your account has not been confirmed successfully."));
			}
		}
	
	}
	
	public function signup($step = 1) {
		$this->loadModel("DigitalSignature");
		$this->loadModel("Location");
		if ($this->Session->read("selectedLanguage.Language.id")) {
			$languageId = $this->Session->read("selectedLanguage.Language.id");
		} else {
			$languageId = 1;
		}
		$aprovalForm = $this->DigitalSignature->find("first",array("conditions"=>array("language_id"=>$languageId)));
		$locations = $this->Location->find("list",array("conditions"=>array("is_active"=>1),"fields"=>array("id","name")));
		if ( $this->request->is("post") ) {
			$requestData = $this->request->data;
			//pr($requestData);
			//die;
			if ( $this->request->data['User']['step'] != 3 && isset($this->request->data['User']['tempclientsignature']['tmp_name']) && !empty($this->request->data['User']['tempclientsignature']['tmp_name']) )  { 
				$im = file_get_contents($this->request->data['User']['tempclientsignature']['tmp_name']);
				$imdata = base64_encode($im);
				$this->request->data['User']['clientsignature'] = $requestData['User']['clientsignature'] = $imdata;
				unset($requestData['User']['tempclientsignature']);
			}
			if ( $this->request->data['User']['step'] == 3) {
				unset($requestData['User']['tempclientsignature']);
				//$requestData['User']['clientsignature'] = '';
			}
			$this->Session->write("step",$requestData);
			$this->User->set($requestData);
			$this->loadModel("UserDetail");
			//pr($requestData);
			$this->UserDetail->set($requestData);
			if ( $this->User->validates() && $this->UserDetail->validates() ) {
				$step = $this->request->data['User']['step'];
				$step += 1;
				$this->set("step",$step);
				
				$requestData['User']['password'] = $this->Auth->password($requestData['User']['password']);
				if ( $this->request->data['User']['step'] == 3){
					$requestData['User']['confirmation_token'] = $confirmToken = $this->encryptpass($requestData['User']['username']);
					//pr($requestData);
					//die;
					$this->User->validate = $this->UserDetail->validate = array();
					if ( $this->User->saveAll($requestData,array("validates"=>false))) {
					    $this->Session->destroy($requestData);
						//die("here");
						$this->getMailData("SIGNUP_CONFIRMATION");
						$link = SITE_LINK."confirmlink/".$confirmToken;
						$this->mailBody = str_replace("{User}",$requestData['UserDetail']['name'],$this->mailBody);
						$this->mailBody = str_replace("{CLICK_HERE}","<a href='".$link."'>Click Here</a>",$this->mailBody);
						$this->mailBody = str_replace("{LINK}",$link,$this->mailBody);
						$this->sendMail($requestData['User']['username']);
						
						$this->Session->setFlash(__("Signup is sucessfull, please check your email to confirm your account."), 'default', array("class"=>"success_message"));
						
						$this->redirect("/login");
					} else {
						$this->Session->destroy();
						$this->Session->setFlash(__("Signup is not successfull, please try again. "));
						//pr($this->User->validationErrors);
						//pr($this->UserDetail->validationErrors);
						//die("hello");
					}
				}
				
			} else {
				$this->set("step",$this->request->data['User']['step']);
				//pr($this->User->validationErrors);
				//die;
				$this->Session->setFlash(__("Problem in your form,please check."));
			}
			//$this->User->saveAll($this->request->data);
		} else {
			$this->set("step",$step);
			if ( $this->Session->read("step") ) {
				//pr($this->Session->read("step".$step));
				$this->request->data = $this->Session->read("step");
				
			}
			
		}
		
		$this->set(compact('aprovalForm',"locations"));
}
	
	public function confirmlink($token = NULL) {
		$users = $this->User->find("first",array("conditions"=>array("User.confirmation_token"=>$token,"is_active"=>0),"recursive"=>0));
		
		if ( !empty($users) ) {
			$users['User']['confirmation_token'] = '';
			$users['User']['is_active'] = 1;
			$this->User->create();
			$this->User->id = $users['User']["id"];
			//pr($users);
			//die;
			//$this->User->validates = array();
			if ($this->User->save($users,array("validate"=>false))){
				$this->Session->setFlash(__("Your account has been confirmed successfully."), 'default', array("class"=>"success_message"));
			} else {
				$this->Session->setFlash(__("Your account has not been confirmed successfully."));
			}

		} else{
			$this->Session->setFlash(__("Invalid Link"));
		}
		$this->redirect("/login");
		//$this->render(false);
	}
	
    public function forgot_password() {
		if ( $this->request->is("post") ) {
			$users = $this->User->find("first",array("conditions"=>array("User.username"=>$this->request->data['User']['email'],"is_active"=>1),"recursive"=>0));
			if ( !empty($users) ) {
				$forgotToken  = $this->encryptpass($users['User']['username']);
				$users['User']['password_token'] = $forgotToken;
				if ( $this->User->save($users,array("validate"=>false)) ) {
					$this->getMailData("FORGOT_PASSWORD");
					$link = SITE_LINK."reset_password/".$forgotToken;
					$this->mailBody = str_replace("{User}",$users['UserDetail']['name'],$this->mailBody);
					$this->mailBody = str_replace("{CLICK_HERE}","<a href='".$link."'>Click Here</a>",$this->mailBody);
					$this->mailBody = str_replace("{LINK}",$link,$this->mailBody);
					$this->sendMail($users['User']['username']);
					$this->Session->setFlash(__("Your request to reset password is submitted, please check your email."), 'default', array("class"=>"success_message"));
					$this->redirect("/forgot_password");
					
				} else {
					
					$this->Session->setFlash(__("Your request could not be processed, please try again."));
				} 
			} else {
				$this->Session->setFlash(__("Invalid email for forgot password request."));
			}
		}
	}
	
	public function reset_password($token = NULL){
		$users = $this->User->find("first",array("conditions"=>array("User.password_token"=>$token,"is_active"=>1),"recursive"=>0));
		//pr($users);
		if ( !empty($users) ) {
			if ( $this->request->is("post") ) {
				$tempData["User"]["password"] = $this->request->data['User']['password'];
				$tempData["User"]["confirm_password"] = $this->request->data['User']['confirm_password'];
				$this->User->set($tempData);
				if ( $this->User->validates() ) {
					$users['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
					$users['User']['password_token'] = '';
					$this->User->save($users,array("validates"=>false));
					$this->Session->setFlash(__("Your password has been reset successfully."), 'default', array("class"=>"success_message"));
					$this->redirect("/login");
				} else {
					$this->Session->setFlash(__("Request not processed, please try again."));
				}
			}
		} else {
			$this->Session->setFlash(__("Invalid request."));
		}
	
	}
     
	public function login() {
		$this->checkLogin();
		
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
				$this->Session->setFlash(__("Invalid login credentials"));
				$this->redirect("/login");
			}
		}
	}
	
	public function logout() {
		$this->Auth->logout();
		$this->Session->destroy();
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
	public function admin_index($searchval = NULL) {
		$this->bulkactions();
		if ( !empty($searchval) ) {
			$this->set("searchval",$searchval);
			$this->conditions = array("User.username like"=> "%".$searchval."%");
		}
		if ( $this->request->is("post") ) {
			if ( !empty($this->data['User']['searchval']) ) {
				$this->redirect(SITE_LINK."ad-users/".$this->data['User']['searchval']);
			} else {
				$this->redirect(SITE_LINK."ad-users/");
			}
		}
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate($this->conditions));
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
