<div class="places form">
<?php echo $this->Form->create('Place'); ?>
	<fieldset>
		<legend><?php echo __('Add Place'); ?></legend>
	<?php
		echo $this->Form->input('user_id', array('type' => 'select', 'options' => $users));
		echo $this->Form->input('status', array('type' => 'radio', 'options' => $op['public']));
		echo $this->Form->input('name');
		echo $this->Form->input('latitude');
		echo $this->Form->input('longitude');
		echo $this->Form->input('comment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Places'), array('action' => 'index')); ?></li>
	</ul>
</div>
