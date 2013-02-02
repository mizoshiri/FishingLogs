<div class="places form">
<?php echo $this->Form->create('Place'); ?>
	<fieldset>
		<legend><?php echo __('Edit Place'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
?>
    <div id="map" style="height:300px"></div>
<?php
		echo $this->Form->input('latitude');
		echo $this->Form->input('longitude');
		echo $this->Form->input('status', array('type' => 'radio', 'options' => $op['public']));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Place.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Place.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Places'), array('action' => 'index')); ?></li>
	</ul>
</div>
