<?php
App::uses('AppController', 'Controller');
/**
 * Types Controller
 *
 * @property Type $Type
 */
class TypesController extends AppController {


/**
* BeforeFilter action
* @return void
*/
    public function beforeFilter()
    {
        
        $this->set('op', Configure::read('Conf'));
        parent::beforeFilter();
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Type->recursive = 0;
		$this->set('types', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Type->id = $id;
		if (!$this->Type->exists()) {
			throw new NotFoundException(__('Invalid type'));
		}
		$this->set('type', $this->Type->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Type->create();
			if ($this->Type->save($this->request->data)) {
				$this->flash(__('Type saved.'), array('action' => 'index'));
			    $this->redirect(array('action' => 'index' ));
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
		$this->Type->id = $id;
		if (!$this->Type->exists()) {
			throw new NotFoundException(__('Invalid type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Type->save($this->request->data)) {
				$this->flash(__('The type has been saved.'), array('action' => 'index'));
			    $this->redirect(array('action' => 'index' ));
			}
		} else {
			$this->request->data = $this->Type->read(null, $id);
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
		$this->Type->id = $id;
		if (!$this->Type->exists()) {
			throw new NotFoundException(__('Invalid type'));
		}
		if ($this->Type->delete()) {
			$this->flash(__('Type deleted'), array('action' => 'index'));
		}
		$this->flash(__('Type was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
