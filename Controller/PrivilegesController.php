<?php
App::uses('AdminAppController', 'Admin.Controller');
/**
 * Privileges Controller
 *
 */
class PrivilegesController extends AdminAppController {

	public function beforeFilter() {   
		 parent::beforeFilter();
		 // Outros códigos que precisar
	}

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
		$this->Privilege->recursive = 0;
		$this->set('privileges', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Privilege->exists($id)) {
			throw new NotFoundException(__('Invalid privilege'));
		}
		$options = array('conditions' => array('Privilege.' . $this->Privilege->primaryKey => $id));
		$this->set('privilege', $this->Privilege->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Privilege->create();
			if ($this->Privilege->save($this->request->data)) {
				$this->Session->setFlash(__('The privilege has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The privilege could not be saved. Please, try again.'));
			}
		}
/*
		$controllers = App::objects('Controller');

		$value = 'AppController';
		$key = array_search($value, $controllers);
		unset($controllers[$key]);
		$value = 'PagesController';
		$key = array_search($value, $controllers);
		unset($controllers[$key]);

		$t = 1;
		$c = '';
		foreach($controllers as $controller){
			if(count($controller) > $t ){
				$c .= strtolower(substr($controller,0,strlen($controller)-10)).',';
			}else{
				$c .= strtolower(substr($controller,0,strlen($controller)-10));
			}
			$t ++;
		}
		$this->set('controllers',$controllers);
*/
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Privilege->exists($id)) {
			throw new NotFoundException(__('Invalid privilege'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Privilege->save($this->request->data)) {
				$this->Session->setFlash(__('The privilege has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The privilege could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Privilege.' . $this->Privilege->primaryKey => $id));
			$this->request->data = $this->Privilege->find('first', $options);
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
		$this->Privilege->id = $id;
		if (!$this->Privilege->exists()) {
			throw new NotFoundException(__('Invalid privilege'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Privilege->delete()) {
			$this->Session->setFlash(__('The privilege has been deleted.'));
		} else {
			$this->Session->setFlash(__('The privilege could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

}
