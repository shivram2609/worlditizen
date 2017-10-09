<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link https://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();
	
	function beforefilter() {
		parent::beforefilter();
		$this->Auth->allow();
	}
	
	
	function index() {
		//die("here");
		$this->layout = "default";
		$this->getLanguages();
		if ( $this->request->is("post") ) {
			$selectedLanguage = $this->getLanguages($this->request->data['Page']['language']);
			$this->Session->write("selectedLanguage",$selectedLanguage);
			$this->Session->write('Config.language', $selectedLanguage['Language']['short_code']);
		}
		if ( $this->Session->read("selectedLanguage.Language.id") )	{
			//die("here");
			$this->request->data['Page']['language'] = $this->Session->read("selectedLanguage.Language.id");
		}
		
	}
	
	function staticpage($key = NULL) {
		if ( $this->Session->read("selectedLanguage.Language.id") )	{
			$langId = $this->Session->read("selectedLanguage.Language.id");
		} else {
			$langId = 1;
		}
		$this->loadModel("CmsPages");
		$this->set("pageContent",$this->CmsPages->find("first",array("conditions"=>array("seo_url"=>$key,"language_id"=>$langId,"is_active"=>1))));
	}

/**
 * Displays a view
 *
 * @return CakeResponse|null
 * @throws ForbiddenException When a directory traversal attempt.
 * @throws NotFoundException When the view file could not be found
 *   or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		if (in_array('..', $path, true) || in_array('.', $path, true)) {
			throw new ForbiddenException();
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
}
