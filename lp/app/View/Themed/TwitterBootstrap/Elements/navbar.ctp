<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="#">CakePHP Project</a>
      <div class="nav-collapse">
        <ul class="nav">
          <li><?php echo $this->Html->link(__('User'), array('admin' => false, 'controller' => 'users', 'action' => 'index')); ?></li>
          <li><?php echo $this->Html->link(__('Log'), array('admin' => false, 'controller' => 'logs', 'action' => 'index')); ?></li>
          <li><?php echo $this->Html->link(__('Place'), array('admin' => false, 'controller' => 'places', 'action' => 'index')); ?></li>
          <li><?php echo $this->Html->link(__('Type'), array('admin' => false, 'controller' => 'types', 'action' => 'index')); ?></li>
          <li><?php echo $this->Html->link(__('Logout'), array('admin' => false, 'controller' => 'users', 'action' => 'logout')); ?></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>
