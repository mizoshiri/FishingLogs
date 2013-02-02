<?php
App::uses('AppController', 'Controller');



/**
 * Logs Controller
 *
 * @property Log $Log
 */
class LogsController extends AppController {

    var $uses = array('Log', 'User', 'Place', 'Type');

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
		$this->Log->recursive = 0;
		$this->set('logs', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Log->id = $id;
		if (!$this->Log->exists()) {
			throw new NotFoundException(__('Invalid log'));
		}
		$this->set('log', $this->Log->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Log->create();
			if ($this->Log->save($this->request->data)) {
				$this->flash(__('Log saved.'), array('action' => 'index'));
			    $this->redirect(array('action' => 'index' ));
            }
        }
	    $params = array('conditions' => array('kind' => 3));
        $types = $this->Type->find('list', $params);
	    $params = array('conditions' => array('kind' => 2));
        $baits = $this->Type->find('list', $params);
	    $params = array('conditions' => array('kind' => 1));
        $fish = $this->Type->find('list', $params);
	    $params = array(
                    'fields' => array('id', 'first_name'),
                    'conditions' => array('status' => 1));
        $users = $this->User->find('list', $params);
	    $params = array(
                    'fields' => array('id', 'name'),
                    'conditions' => array('status' => 1));
        $places = $this->Place->find('list', $params);
        $this->set(compact('types', 'places', 'users', 'fish', 'baits'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Log->id = $id;
		if (!$this->Log->exists()) {
			throw new NotFoundException(__('Invalid log'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Log->save($this->request->data)) {
				$this->flash(__('The log has been saved.'), array('action' => 'index'));
			} else {
			}
		} else {
			$this->request->data = $this->Log->read(null, $id);
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
		$this->Log->id = $id;
		if (!$this->Log->exists()) {
			throw new NotFoundException(__('Invalid log'));
		}
		if ($this->Log->delete()) {
			$this->flash(__('Log deleted'), array('action' => 'index'));
		}
		$this->flash(__('Log was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
