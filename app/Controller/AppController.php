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
	
	function beforefilter() {
		if (!defined('SITE_LINK')) { 
			define('SITE_LINK',"http://localhost/worldcitizen/");
		}
		$this->Auth->scope = array('User.is_active' =>1);
		if ($this->params['prefix']) {
			$this->layout = "admin";
		} else {
			$this->layout = "frontend";
		}
	}
	
	public function getUserDetail() {
		$id = $this->Session->read("Auth.User.id");
		$this->loadModel("User");
		$temp = $this->User->find("first",array("conditions"=>array("User.id"=>$id)));
		$this->Session->write("User",$temp);
	}
}
