<?php
App::uses('AppController', 'Controller');
/**
 * Places Controller
 *
 * @property Place $Place
 */
class PlacesController extends AppController {

    var $uses = array('Place', 'Type', 'User');

/**
 * before method
 *
 * @return void
 */
    public function beforeFilter() {
        $this->set('op', Configure::read('Conf'));
        parent::beforeFilter();
    } 


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Place->recursive = 0;
		$this->set('places', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Place->id = $id;
		if (!$this->Place->exists()) {
			throw new NotFoundException(__('Invalid place'));
		}
		$this->set('place', $this->Place->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Place->create();
			if ($this->Place->save($this->request->data)) {
				$this->flash(__('Place saved.'), array('action' => 'index'));
			    $this->redirect(array('action' => 'index' ));
            } else {
			}
		}
	    $params = array('conditions' => array('kind' => 3));
        $types = $this->Type->find('list', $params);
	    $params = array(
                    'fields' => array('id', 'first_name'),
                    'conditions' => array('status' => 1));
        $users = $this->User->find('list', $params);
        $this->set(compact('types', 'users'));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Place->id = $id;
		if (!$this->Place->exists()) {
			throw new NotFoundException(__('Invalid place'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Place->save($this->request->data)) {
				$this->flash(__('The place has been saved.'), array('action' => 'index'));
			} else {
			}
		} else {
			$this->request->data = $this->Place->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Place->id = $id;
		if (!$this->Place->exists()) {
			throw new NotFoundException(__('Invalid place'));
		}
		if ($this->Place->delete()) {
			$this->flash(__('Place deleted'), array('action' => 'index'));
		}
		$this->flash(__('Place was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
