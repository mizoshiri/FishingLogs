<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="/"><?php echo Configure::read('Site.name');?></a>
      <div class="nav-collapse">
        <ul class="nav">
          <li><?php echo $this->Html->link(__('Log'), array('admin' => false, 'controller' => 'logs', 'action' => 'index')); ?></li>
          <li><?php echo $this->Html->link(__('Place'), array('admin' => false, 'controller' => 'places', 'action' => 'index')); ?></li>
          <?php if($user !== null): ?>
          <li><?php echo $this->Html->link(__('Profile'), array('admin' => false, 'controller' => 'users', 'action' => 'index')); ?></li>
          <li><?php echo $this->Html->link(__('Logout'), array('admin' => false, 'controller' => 'users', 'action' => 'logout')); ?></li>
          <?php else:?>
                <li><?php echo $this->Html->link(__('Login'), array('admin' => false, 'controller' => 'users', 'action' => 'login')); ?></li>
                <li><?php echo $this->Html->link(__('Sign Up'), array('admin' => false, 'controller' => 'users', 'action' => 'register', 'class' => 'btn btn-primary btn-large' )); ?></li>
          <?php endif;?>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>
