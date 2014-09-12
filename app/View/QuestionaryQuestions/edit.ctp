<div class="questionaryQuestions form">
<?php echo $this->Form->create('QuestionaryQuestion'); ?>
	<fieldset>
		<legend><?php echo __('Editar Pergunta do Questionário'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('questionary_id', array('label' => 'Questionário'));
		echo $this->Form->input('question_id', array('label' => 'Pergunta'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar')); ?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $this->Form->value('QuestionaryQuestion.id')), null, __('Deseja realmente excluir a pergunta %s?', $this->Form->value('QuestionaryQuestion.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Questionários'), array('controller' => 'questionaries', 'action' => 'index')); ?> </li>
	</ul>
</div>
