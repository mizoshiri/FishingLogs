<h1>Login</h1>                                                                                                                                                                    
<?php
    echo $this->Form->create();
    echo $this->Form->input('email');
    echo $this->Form->input('password');
    echo $this->Form->submit('Login', array('after' => ' Don\'t have an account? ' . $this->Html->link('Register!', array('action' => 'register'))));
    echo $this->Form->end();
?>
