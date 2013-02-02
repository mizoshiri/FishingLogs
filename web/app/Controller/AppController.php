<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $theme = 'TwitterBootstrap';
    
    public $components = array(
        'DebugKit.Toolbar',
        'Auth' => array(
            'loginRedirect' => '/home',
            'logoutRedirect' => '/users/login',
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email'),
                ),
            ),
        ),
        'Session',
        'RequestHandler',
    );

    public function beforeFilter() {
        $user = $this->Auth->user();
        parent::beforeFilter();
        $version = '0.1';
        $googleApiKey = Configure::read('Google.API.Key');
        $this->set(compact('user', 'version', 'googleApiKey'));
    } 
}
