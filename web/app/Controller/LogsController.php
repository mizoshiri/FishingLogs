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
        $this->paginate = array('conditions' => array('Log.user_id' => $this->viewVars['user']['id']));
		$logs = $this->paginate('Log');
        $this->set(compact('logs'));
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
        $params = array('conditions' => array(
                                        'Log.id' => $id,
                                        'Log.user_id' => $this->viewVars['user']['id'])
        );
		$log = $this->Log->find('first', $paramas);
		if (!$log) {
			throw new NotFoundException(__('Invalid log'));
		}
        $this->set(compact('log'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
        $uId = $this->viewVars['user']['id']; 
		
        if ($this->request->is('post')) {
			$this->Log->create();
            $this->request->data['Log']['user_id'] = $uId;
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
                    'fields' => array('id', 'name'),
                    'conditions' => array('status' => 1, 'Place.user_id' => $uId));
        $places = $this->Place->find('list', $params);
        $this->set(compact('types', 'places', 'fish', 'baits'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $uId = $this->viewVars['user']['id']; 
        $params = array('conditions' => array(
                                        'Log.id' => $id,
                                        'Log.user_id' => $uId)
        );
		$log = $this->Log->find('first', $params);
		$this->Log->id = $id;
		if (!$log) {
			throw new NotFoundException(__('Invalid log'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Log->save($this->request->data)) {
				$this->flash(__('The log has been saved.'), array('action' => 'index'));
			    $this->redirect(array('action' => 'index' ));
			}
		} else {
			$this->request->data = $this->Log->read(null, $id);
		}
        $params = array('conditions' => array('kind' => 3));
        $types = $this->Type->find('list', $params);
	    $params = array('conditions' => array('kind' => 2));
        $baits = $this->Type->find('list', $params);
	    $params = array('conditions' => array('kind' => 1));
        $fish = $this->Type->find('list', $params);
	    $params = array(
                    'fields' => array('id', 'name'),
                    'conditions' => array('status' => 1, 'Place.user_id' => $uId));
        $places = $this->Place->find('list', $params);
        $this->set(compact('types', 'places', 'fish', 'baits'));
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
        $params = array('conditions' => array(
                                        'Log.id' => $id,
                                        'Log.user_id' => $this->viewVars['user']['id'])
        );
		$log = $this->Log->find('first', $paramas);
		if (!$log) {
			throw new NotFoundException(__('Invalid log'));
		}
		$this->Log->id = $id;
		if ($this->Log->delete()) {
			$this->flash(__('Log deleted'), array('action' => 'index'));
		}
		$this->flash(__('Log was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
