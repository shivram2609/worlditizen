<?php
App::uses('AppController', 'Controller');
/**
 * CmsPages Controller
 *
 * @property CmsPage $CmsPage
 * @property PaginatorComponent $Paginator
 */
class CmsPagesController extends AppController {

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
		$this->CmsPage->recursive = 0;
		$this->set('cmsPages', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CmsPage->exists($id)) {
			throw new NotFoundException(__('Invalid cms page'));
		}
		$options = array('conditions' => array('CmsPage.' . $this->CmsPage->primaryKey => $id));
		$this->set('cmsPage', $this->CmsPage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CmsPage->create();
			if ($this->CmsPage->save($this->request->data)) {
				$this->Flash->success(__('The cms page has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The cms page could not be saved. Please, try again.'));
			}
		}
		$languages = $this->CmsPage->Language->find('list');
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
		if (!$this->CmsPage->exists($id)) {
			throw new NotFoundException(__('Invalid cms page'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CmsPage->save($this->request->data)) {
				$this->Flash->success(__('The cms page has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The cms page could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CmsPage.' . $this->CmsPage->primaryKey => $id));
			$this->request->data = $this->CmsPage->find('first', $options);
		}
		$languages = $this->CmsPage->Language->find('list');
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
		$this->CmsPage->id = $id;
		if (!$this->CmsPage->exists()) {
			throw new NotFoundException(__('Invalid cms page'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CmsPage->delete()) {
			$this->Flash->success(__('The cms page has been deleted.'));
		} else {
			$this->Flash->error(__('The cms page could not be deleted. Please, try again.'));
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
			$this->conditions = array("OR"=>array("CmsPage.slug like"=> "%".$searchval."%","Lower(Language.name) like"=> "%".strtolower($searchval)."%"));
		}
		if ( $this->request->is("post") ) {
			if ( !empty($this->data['CmsPage']['searchval']) ) {
				$this->redirect(SITE_LINK."ad-cmspages/".$this->data['CmsPage']['searchval']);
			} else {
				$this->redirect(SITE_LINK."ad-cmspages/");
			}
		}
		$this->CmsPage->recursive = 0;
		$this->set('cmsPages', $this->Paginator->paginate($this->conditions));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CmsPage->exists($id)) {
			throw new NotFoundException(__('Invalid cms page'));
		}
		$options = array('conditions' => array('CmsPage.' . $this->CmsPage->primaryKey => $id));
		$this->set('cmsPage', $this->CmsPage->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CmsPage->create();
			if ($this->CmsPage->save($this->request->data)) {
				$this->Flash->success(__('The cms page has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The cms page could not be saved. Please, try again.'));
			}
		}
		$languages = $this->CmsPage->Language->find('list');
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
		if (!$this->CmsPage->exists($id)) {
			throw new NotFoundException(__('Invalid cms page'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CmsPage->save($this->request->data)) {
				$this->Flash->success(__('The cms page has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The cms page could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CmsPage.' . $this->CmsPage->primaryKey => $id));
			$this->request->data = $this->CmsPage->find('first', $options);
		}
		$languages = $this->CmsPage->Language->find('list');
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
		$this->CmsPage->id = $id;
		if (!$this->CmsPage->exists()) {
			throw new NotFoundException(__('Invalid cms page'));
		}
		//$this->request->allowMethod('post', 'delete');
		if ($this->CmsPage->delete()) {
			$this->Flash->success(__('The cms page has been deleted.'));
		} else {
			$this->Flash->error(__('The cms page could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
