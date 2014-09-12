<div class="questionaries form">
<?php echo $this->Form->create('Questionary'); ?>
	<fieldset>
		<legend><?php echo __('Edit Questionary'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Questionary.id')), null, __('Deseja realmente excluir # %s?', $this->Form->value('Questionary.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Questionaries'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Questionary Questions'), array('controller' => 'questionary_questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionary Question'), array('controller' => 'questionary_questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
