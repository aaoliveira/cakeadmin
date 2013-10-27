<div class="privileges index">
	<h2><?php echo __('Privileges'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('group_name'); ?></th>
			<th><?php echo $this->Paginator->sort('controller'); ?></th>
			<th><?php echo $this->Paginator->sort('action'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($privileges as $privilege): ?>
	<tr>
		<td><?php echo h($privilege['Privilege']['id']); ?>&nbsp;</td>
		<td><?php echo h($privilege['Privilege']['group_name']); ?>&nbsp;</td>
		<td><?php echo h($privilege['Privilege']['controller']); ?>&nbsp;</td>
		<td><?php echo h($privilege['Privilege']['action']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $privilege['Privilege']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $privilege['Privilege']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $privilege['Privilege']['id']), null, __('Are you sure you want to delete # %s?', $privilege['Privilege']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Privilege'), array('action' => 'add')); ?></li>
	</ul>
</div>
