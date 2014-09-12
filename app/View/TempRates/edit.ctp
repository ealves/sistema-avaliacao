<div class="tempRates form">
<?php echo $this->Form->create('TempRate'); ?>
	<fieldset>
		<legend><?php echo __('Edit Temp Rate'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('questionary_id');
		echo $this->Form->input('question_id');
		echo $this->Form->input('subject_id');
		echo $this->Form->input('rate');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TempRate.id')), null, __('Deseja realmente excluir # %s?', $this->Form->value('TempRate.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Temp Rates'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Questionaries'), array('controller' => 'questionaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionary'), array('controller' => 'questionaries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subjects'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject'), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
	</ul>
</div>
