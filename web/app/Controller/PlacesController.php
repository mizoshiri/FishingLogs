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
        $this->paginate = array('conditions' => array('Place.user_id' => $this->viewVars['user']['id']));
		$places = $this->paginate('Place');
        $this->set(compact('places'));
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
			$this->request->data['Place']['user_id'] =  $this->viewVars['user']['id'];
            if ($this->Place->save($this->request->data)) {
				$this->flash(__('Place saved.'), array('action' => 'index'));
			    $this->redirect(array('action' => 'index' ));
			}
		}
        $lat = '-33.86017698606264';	
        $lon = '151.25294494628906';	
        $this->set(compact('lat', 'lon'));
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
			    $this->redirect(array('action' => 'index' ));
			}
		} else {
			$this->request->data = $this->Place->read(null, $id);
		}
        $lat = $this->request->data['Place']['latitude'];	
        $lon = $this->request->data['Place']['longitude'];	
        $this->set(compact('lat', 'lon'));
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
