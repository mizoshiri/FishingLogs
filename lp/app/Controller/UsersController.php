<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property 'Session'Component $'Session'
 */
class UsersController extends AppController {

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
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
        if ($this->request->is('post')) {
			$this->User->create();
		//	$this->redirect->data['User']['created'] = date('Y-m-d h:i:s');
            if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Thank you for sign up!! We will lunch site and Apps soon and send email!!'));
				$this->redirect("/");
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
        $title_for_layout = "Keep your fishing Logs & records and Share friends and find a great place for fishing place!";
	    $this->set(compact('title_for_layout'));
        $this->layout = "lp";
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
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
