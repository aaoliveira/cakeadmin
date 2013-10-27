<div class="privileges form">
<?php echo $this->Form->create('Privilege'); 
?>
	<fieldset>
		<legend><?php echo __('Add Privilege'); ?></legend>
	<?php
//		echo $this->Form->input('group_name');
		$options = array(''=>'Selecione','admins' => 'Admins', 'managers'=>'Managers');
		echo $this->Form->input('group_name', array('type'=>'select','label' => 'Grupo','options' => $options,'default'=>'0'));
		echo $this->Form->input('controller');
//		echo $this->Form->input('controller', array('type'=>'select','label' => 'Controller','options' => $controllers));

		echo $this->Form->input('action');
/*		$options = array(''=>'Selecione','index' => 'Index', 'view'=>'View','add' => 'Add', 'edit'=>'Edit','delete' => 'Delete');
		echo $this->Form->input('action', array('type'=>'select','label' => 'Action','options' => $options,'default'=>'0'));
*/
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Privileges'), array('action' => 'index')); ?></li>
	</ul>
</div>
