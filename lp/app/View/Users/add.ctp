<div id="page" class="clear">
    <div class="pageWrap">
        <div id="content" role="main">
        <div class="contentWrap">

		<section class="form">
		<div class="sectionWrap">									
<?php echo $this->Form->create('User'); ?>
            <fieldset>
			<h4 id="formHeader">We're launching in closed beta soon, sign up to be notified when it's ready.</h4>
	
    <div class="users form">
	<?php
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('sex', array('type' => 'radio', 'options' => $op['sex']));
		echo $this->Form->input('birth', array('maxYear' => date('Y'), 'minYear' => '1910' ));
		echo $this->Form->input('payment', array('legend' => 'Plan', 'type' => 'radio', 'options' => $op['pay']));
	?>
<?php echo $this->Form->end(__('Submit')); ?>
    </div>

			</fieldset> 
            </div>
            </section>

    <div id="fb-root"></div>
    <section>
    <div id="howitworks" class="sectionWrap">
		<h1>Keep fishing logs and analays your fishing results!</h1>
		<div class="step step1">
			<h2>Keep your fishing records</h2>
            <p>You can records your fishing records by Apps & Website.</p>
		</div>
		<div class="step step2">
			<h2>Share records with friends</h2>
			<p>Share your fishing records and look your friends fishing records.</p>
		</div>
		<div class="step step3">
			<h2>Find good fishing spots</h2>
			<p>You can check other poeple fishing place and results and spots.</p>
		</div>
	</div>
    </section>

	 		</div><!-- end contentwrap -->  	
		</div><!-- end #content -->
	</div><!-- end pagewrap --> 
</div><!-- end page -->

