<div class="questionsQuestionaries view">
<h2><?php  echo __('Questions Questionary'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($questionsQuestionary['QuestionsQuestionary']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question'); ?></dt>
		<dd>
			<?php echo $this->Html->link($questionsQuestionary['Question']['name'], array('controller' => 'questions', 'action' => 'view', $questionsQuestionary['Question']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Questionary'); ?></dt>
		<dd>
			<?php echo $this->Html->link($questionsQuestionary['Questionary']['name'], array('controller' => 'questionaries', 'action' => 'view', $questionsQuestionary['Questionary']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Questions Questionary'), array('action' => 'edit', $questionsQuestionary['QuestionsQuestionary']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Questions Questionary'), array('action' => 'delete', $questionsQuestionary['QuestionsQuestionary']['id']), null, __('Deseja realmente excluir # %s?', $questionsQuestionary['QuestionsQuestionary']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions Questionaries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questions Questionary'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questionaries'), array('controller' => 'questionaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionary'), array('controller' => 'questionaries', 'action' => 'add')); ?> </li>
	</ul>
</div>
