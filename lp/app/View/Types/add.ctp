<div class="types form">
<?php echo $this->Form->create('Type'); ?>
	<fieldset>
		<legend><?php echo __('Add Type'); ?></legend>
	<?php
		echo $this->Form->input('kind', array('type' => 'radio', 'options' => $op['type']));
		echo $this->Form->input('name');
		echo $this->Form->input('photo');
		echo $this->Form->input('others');
		echo $this->Form->input('detail');
		echo $this->Form->input('sort');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Types'), array('action' => 'index')); ?></li>
	</ul>
</div>
