<div class="places view">
<h2><?php  echo __('Place'); ?></h2>
	<dl>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($op['public'][$place['Place']['status']]); ?>
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($place['Place']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Latitude'); ?></dt>
		<dd>
			<?php echo h($place['Place']['latitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitude'); ?></dt>
		<dd>
			<?php echo h($place['Place']['longitude']); ?>
			&nbsp;
		</dd>
			<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($place['Place']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($place['Place']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Place'), array('action' => 'edit', $place['Place']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Place'), array('action' => 'delete', $place['Place']['id']), null, __('Are you sure you want to delete # %s?', $place['Place']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Places'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place'), array('action' => 'add')); ?> </li>
	</ul>
</div>
