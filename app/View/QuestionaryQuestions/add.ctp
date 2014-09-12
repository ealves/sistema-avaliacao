<div class="questionaryQuestions form">
<?php echo $this->Form->create('QuestionaryQuestion'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Pergunta ao Questionário'); ?></legend>
	<?php
		echo $this->Form->input('questionary_id', array('label' => 'Questionário', 'default' => $questionary_id));
		echo $this->Form->input('question_id', array('label' => 'Pergunta'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Adicionar')); ?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Listar Questionários'), array('controller' => 'questionaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Questionário'), array('controller' => 'questionaries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Perguntas'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Pergunta'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
