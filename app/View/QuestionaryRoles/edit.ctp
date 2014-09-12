<div class="questionaryRoles form">
<?php echo $this->Form->create('QuestionaryRole'); ?>
	<fieldset>
		<legend><?php echo __('Edit Questionary Role'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('questionary_id');
		echo $this->Form->input('role_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('QuestionaryRole.id')), null, __('Deseja realmente excluir # %s?', $this->Form->value('QuestionaryRole.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Questionary Roles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Questionaries'), array('controller' => 'questionaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionary'), array('controller' => 'questionaries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
	</ul>
</div>
