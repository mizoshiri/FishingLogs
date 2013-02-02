<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Register your information'); ?></legend>
	<?php
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('sex', array('type' => 'radio', 'options' => $op['sex']));
		echo $this->Form->input('birth', array('label' => 'Your Birthday', 'maxYear' => date('Y'), 'minYear' => '1910'));
		echo $this->Form->input('experience', array('label' => "Your fishing experince"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
