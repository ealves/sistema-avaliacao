<div class="questionsQuestionaries form">
<?php echo $this->Form->create('QuestionsQuestionary'); ?>
	<fieldset>
		<legend><?php echo __('Editar Perguntas do Questionário'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('question_id');
		echo $this->Form->input('questionary_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('QuestionsQuestionary.id')), null, __('Deseja realmente excluir # %s?', $this->Form->value('QuestionsQuestionary.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Questions Questionaries'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questionaries'), array('controller' => 'questionaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionary'), array('controller' => 'questionaries', 'action' => 'add')); ?> </li>
	</ul>
</div>
