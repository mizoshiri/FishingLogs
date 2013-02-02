 <!-- Main hero unit for a primary marketing message or call to action -->
  <div class="hero-unit">
    <h1>Keep your fishing records and share with Friends</h1>
    <p><?php echo Configure::read("Site.name");?> can keep your fishing records and share with your friends. Also you can find good fishing spots!!</p>
    <p><a class="btn btn-primary btn-large" href="/register">Sign Up &raquo;</a></p>
  </div>

  <!-- Example row of columns -->
  <div class="row">
    <div class="span4">
      <h2>iPhone & Android Apps</h2>
       <p>We are making iPhone Apps and Android Apps for keeping your fishing records.</p>
      <p><a class="btn" href="#">View details &raquo;</a></p>
    </div>
    <div class="span4">
      <h2>Share with Friends</h2>
       <p>After you regsit your fishing records you can share with records to your friends.
      <p><a class="btn" href="#">View details &raquo;</a></p>
   </div>
    <div class="span4">
      <h2>Find good spots for Fishing</h2>
      <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
      <p><a class="btn" href="#">View details &raquo;</a></p>
    </div>
 
 <h2>New Fishing Logs</h2>
 <dl>
    <?php foreach($logs as $v) : ?>
        <dt><?php echo $v['Log']['comment']; ?> Date:<?php echo $v['Log']['created']; ?></dt>
        <dd>Fish:<?php echo $v['Fish']['name']; ?> Bait:<?php echo $v['Bait']['name']; ?></dd>
    <?php endforeach;?>
 </dl>
 
 <h2>New Fishing spots</h2>
 <dl>
    <?php foreach($spots as $v) : ?>
        <dt><?php echo $v['Place']['name']; ?> Date:<?php echo $v['Place']['created']; ?></dt>
        <dd>Add by:<?php echo $v['User']['first_name']; ?></a></dd> 
    <?php endforeach;?>
 </dl>
 
 </div>
