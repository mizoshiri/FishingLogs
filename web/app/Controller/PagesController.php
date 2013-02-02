<?php
App::uses('AppController', 'Controller');

class PagesController extends AppController {

    public $name = 'Pages';
	public $uses = array('Log', 'User', 'Place');
 /**
 * before method
 *
 * @return void
 */
    public function beforeFilter() {
        $this->Auth->Allow( array('home'));
        parent::beforeFilter();
    } 


    /**
    *
    */
    public function home()
    {
        $params = array(
                    'conditions' => array('Log.status' =>1, 'User.status' =>1),
                    'limit' => 3
        );
        $logs = $this->Log->find('all', $params);
        $params = array(
                    'conditions' => array('Place.status' =>1, 'User.status' =>1),
                    'limit' => 3
        );
        $spots = $this->Place->find('all', $params);
        $this->set(compact('logs', 'spots'));
    }
}
