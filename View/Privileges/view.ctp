<div class="privileges view">
<h2><?php echo __('Privilege'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($privilege['Privilege']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group Name'); ?></dt>
		<dd>
			<?php echo h($privilege['Privilege']['group_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Controller'); ?></dt>
		<dd>
			<?php echo h($privilege['Privilege']['controller']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Action'); ?></dt>
		<dd>
			<?php echo h($privilege['Privilege']['action']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Privilege'), array('action' => 'edit', $privilege['Privilege']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Privilege'), array('action' => 'delete', $privilege['Privilege']['id']), null, __('Are you sure you want to delete # %s?', $privilege['Privilege']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Privileges'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Privilege'), array('action' => 'add')); ?> </li>
	</ul>
</div>
