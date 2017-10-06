<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	public $components = array(
	"Session",
	"Flash",
	"Cookie",
	'Auth' => array(
			'loginAction' => array(
				'controller' => 'users',
				'action' => 'login',
			),
			'authError' => 'Did you really think you are allowed to see that?',
			'authenticate' => array(
				'Form' => array(
					'fields' => array(
					  'username' => 'username', //Default is 'username' in the userModel
					  'password' => 'password'  //Default is 'password' in the userModel
					),
					'scope' => array('is_active' => '1')
				)
			)
		)
	);
	
	var $conditions = array();
	var $delarr = array();
	var $updatearr = array();
	
	function beforefilter() {
		if ($this->Session->check('Config.language')) {
            Configure::write('Config.language', $this->Session->read('Config.language'));
        } else {
			Configure::write('Config.language', 'en');
		}
		if ( $_SERVER['REMOTE_ADDR'] == '127.0.0.1' ) {
			$link = "http://localhost".$this->base."/";
			$defaultLink = "http://localhost".$this->base;
		} else {
			$link = "http://worldcitizen.zestminds.com/";
			$defaultLink = "http://worldcitizen.zestminds.com";
		}
		if (!defined('SITE_LINK')) { 
			define('SITE_LINK',$link);
			define('DEFAULT_LINK',$defaultLink);
		}
		$this->Auth->scope = array('User.is_active' =>1);
		if ($this->params['prefix']) {
			$this->layout = "admin";
		} else {
			$this->getPages();
			$this->layout = "frontend";
		}
		
		
		
	}
	
	public function getUserDetail() {
		$id = $this->Session->read("Auth.User.id");
		$this->loadModel("User");
		$temp = $this->User->find("first",array("conditions"=>array("User.id"=>$id)));
		$this->Session->write("User",$temp);
	}
	
	function bulkactions($flag = false) {
		//pr($this->data);
		//die;
		/* code to change status and delete by checking data from page */
		$controller = is_array($this->data)?array_keys($this->data):'';
		$statuskey  = '';
		$controller = isset($controller[0])?$controller[0]:'';
		$allowedarr = array("Account","User");
		if (isset($this->data[$controller]) && !empty($this->data[$controller]['options']) && !empty($controller) && !empty($this->data['id'])) {
			//pr($this->data);
			//die;
			foreach ($this->data['id'] as $key=>$val) {
				if ($val > 0) {
					$this->delarr[]	= $key;
					if ($flag) {
						$statuskey = ($this->data[$controller]['options']);
						$this->updatearr[$controller][$key] = array("id"=>$key,"approve"=>($this->data[$controller]['options']));
					} else {
						$statuskey = ($this->data[$controller]['options'] == 'Active'?1:0);
						$this->updatearr[$controller][$key]	= array("id"=>$key,"is_active"=>($this->data[$controller]['options'] == 'Active'?1:0));
					}
				}
			}
			if (isset($this->data[$controller]['options']) && $this->data[$controller]['options'] == 'Delete') {
				if($flag == 1){
					if($this->unlinkDB($this->delarr)){
						$this->$controller->delete($this->delarr);
						$this->redirect($this->referer());
					}
				}
				else{
					if($this->$controller->delete($this->delarr)) {
						$this->Session->setFlash(__('Record has been deleted successfully.'));
					}
					$this->redirect($this->referer());
				}
				$statuskey = -1;
			} else {
				//pr($this->updatearr[$controller]);
				//die;
				//die;
				$this->$controller->create();
				if($this->$controller->saveAll($this->updatearr[$controller],array("validate"=>false))) {
					 $this->Session->setFlash(__('Record has been updated successfully.'));
				}
			
				$this->redirect($this->referer());
			}
			if (empty($this->data['Admin']['searchval'])) {
				$this->data = array();
			}
		}
		if (in_array($controller,$allowedarr) && $statuskey > -1) {
			$arr['keys'] 	= $this->delarr;
			$arr['status']  = $statuskey;
			return $arr; 
		}
		if ($flag) {
			$arr['keys'] = $this->delarr;
			$arr['status']  = $statuskey;
			return $arr; 
		}
		
		/* end of code to change status and delete by checking data from page */
	}
	
	function getLanguages($languageId = NULL) {
		//die("here");
		$this->loadModel("Language");
		$languages = $this->Language->find("list",array("conditions"=>array("is_active"=>1)));
		$this->set(compact("languages"));
		if ( !empty($languageId) ) {
			$languages = $this->Language->find("first",array("conditions"=>array("is_active"=>1,"id"=>$languageId),"recursive"=>-1));
			return $languages;
		} 
	}
	
	function getPages($languageId = 1) {
		if ($this->Session->read("selectedLanguage.Language.id")) {
			$languageId = $this->Session->read("selectedLanguage.Language.id");
		}
		$this->loadModel("CmsPages");
		$this->set("staticPages",$this->CmsPages->find("all",array("conditions"=>array("language_id"=>$languageId,"is_active"=>1),"recursive"=>-1,"fields"=>array("seo_url","header"))));
	}
}
