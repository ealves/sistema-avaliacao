<div class="questionQuestionaries view">
<h2><?php  echo __('Question Questionary'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($questionQuestionary['QuestionQuestionary']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question'); ?></dt>
		<dd>
			<?php echo $this->Html->link($questionQuestionary['Question']['name'], array('controller' => 'questions', 'action' => 'view', $questionQuestionary['Question']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Questionary'); ?></dt>
		<dd>
			<?php echo $this->Html->link($questionQuestionary['Questionary']['name'], array('controller' => 'questionaries', 'action' => 'view', $questionQuestionary['Questionary']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Question Questionary'), array('action' => 'edit', $questionQuestionary['QuestionQuestionary']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Question Questionary'), array('action' => 'delete', $questionQuestionary['QuestionQuestionary']['id']), null, __('Deseja realmente excluir # %s?', $questionQuestionary['QuestionQuestionary']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Question Questionaries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question Questionary'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questionaries'), array('controller' => 'questionaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionary'), array('controller' => 'questionaries', 'action' => 'add')); ?> </li>
	</ul>
</div>
