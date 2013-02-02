<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    public function opauth_complete()
    {
        debug($this->data);
    }

 /**
 * before method
 *
 * @return void
 */
    public function beforeFilter() {
        $this->Auth->Allow( array('add'));
        $this->set('op', Configure::read('Conf'));
        parent::beforeFilter();
    } 

    public function index()
    {
		$id = $this->viewVars['user']['id'];
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
        $user =  $this->User->read();
        $this->loadModel('Log');
        $params = array('condtions' => array('Log.user_id' => $id));
        $logs = $this->Log->find('all', $params);
		$this->set(compact('user', 'logs'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->flash(__('Regist your data.'));
			    $this->redirect(array('action' => 'login' ));
			} else {
			}
		}
	}
	
    public function edit() {
		$this->User->id = $this->viewVars['user']['id'];
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->flash(__('The user has been saved.'), array('action' => 'index'));
			    $this->redirect(array('action' => 'index' ));
			}
		} else {
			$this->request->data = $this->User->read();
		}
	}
    /**
     * Login action
     * @return void
     */
    public function login()
    {   
        if ($this->Auth->user()) {
            $this->redirect($this->Auth->redirect());
        }   
        if ($this->request->isPost()) {
            $this->User->set($this->data);
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash('Sorry, those details are incorrect');
            }   
        }   
    }   

    /**
     * Logout action
     * @return void
     */
    public function logout()
    {
        $this->redirect($this->Auth->logout());
    }
}
