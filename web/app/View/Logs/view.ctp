<div class="logs view">
<h2><?php  echo __('Log'); ?></h2>
	<dl>
		<dt><?php echo __('Place'); ?></dt>
		<dd>
			<?php echo $this->Html->link($log['Place']['name'], array('controller' => 'places', 'action' => 'view', $log['Place']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($log['Type']['name'], array('controller' => 'types', 'action' => 'view', $log['Type']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fish Id'); ?></dt>
		<dd>
			<?php echo $this->Html->link($log['Fish']['name'], array('controller' => 'types', 'action' => 'view', $log['Fish']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fish'); ?></dt>
		<dd>
			<?php echo h($log['Log']['fish']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bait Id'); ?></dt>
		<dd>
			<?php echo $this->Html->link($log['Bait']['name'], array('controller' => 'types', 'action' => 'view', $log['Bait']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bait'); ?></dt>
		<dd>
			<?php echo h($log['Log']['bait']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($op['public'][$log['Log']['status']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($log['Log']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($log['Log']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($log['Log']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($log['Log']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Log'), array('action' => 'edit', $log['Log']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Log'), array('action' => 'delete', $log['Log']['id']), null, __('Are you sure you want to delete # %s?', $log['Log']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Logs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Log'), array('action' => 'add')); ?> </li>
	</ul>
</div>