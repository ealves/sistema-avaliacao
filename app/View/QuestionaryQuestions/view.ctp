<div class="questionaryQuestions view">
<h2><?php  echo __('Pergunta do Questionário'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($questionaryQuestion['QuestionaryQuestion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Questionary'); ?></dt>
		<dd>
			<?php echo $this->Html->link($questionaryQuestion['Questionary']['name'], array('controller' => 'questionaries', 'action' => 'view', $questionaryQuestion['Questionary']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question'); ?></dt>
		<dd>
			<?php echo $this->Html->link($questionaryQuestion['Question']['name'], array('controller' => 'questions', 'action' => 'view', $questionaryQuestion['Question']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit Questionary Question'), array('action' => 'edit', $questionaryQuestion['QuestionaryQuestion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Questionary Question'), array('action' => 'delete', $questionaryQuestion['QuestionaryQuestion']['id']), null, __('Deseja realmente excluir # %s?', $questionaryQuestion['QuestionaryQuestion']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Questionary Questions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionary Question'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questionaries'), array('controller' => 'questionaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionary'), array('controller' => 'questionaries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
