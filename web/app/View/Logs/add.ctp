<div class="logs form">
<?php echo $this->Form->create('Log'); ?>
	<fieldset>
		<legend><?php echo __('Add Fishing Log'); ?></legend>
	<?php
		echo $this->Form->input('place_id', array('empty' => true));
		echo $this->Form->input('type_id');
		echo $this->Form->input('fish_id', array('empty' => true));
		echo $this->Form->input('fish', array('type' => 'text'));
		echo $this->Form->input('bait_id', array('empty' => true));
		echo $this->Form->input('bait', array('type' => 'text'));
        echo $this->Form->input('status', array('type' => 'radio', 'options' => $op['public'], 'default' => 1));
		echo $this->Form->input('comment');
		echo $this->Form->input('date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Logs'), array('action' => 'index')); ?></li>
	</ul>
</div>
