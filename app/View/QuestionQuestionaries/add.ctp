<div class="questionQuestionaries form">
<?php echo $this->Form->create('QuestionQuestionary'); ?>
	<fieldset>
		<legend><?php echo __('Add Question Questionary'); ?></legend>
	<?php
		echo $this->Form->input('question_id');
		echo $this->Form->input('questionary_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Question Questionaries'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questionaries'), array('controller' => 'questionaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionary'), array('controller' => 'questionaries', 'action' => 'add')); ?> </li>
	</ul>
</div>
