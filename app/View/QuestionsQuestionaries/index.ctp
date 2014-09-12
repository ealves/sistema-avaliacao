<div class="questionsQuestionaries index">
	<h2><?php echo __('Questions Questionaries'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('question_id'); ?></th>
			<th><?php echo $this->Paginator->sort('questionary_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($questionsQuestionaries as $questionsQuestionary): ?>
	<tr>
		<td><?php echo h($questionsQuestionary['QuestionsQuestionary']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($questionsQuestionary['Question']['name'], array('controller' => 'questions', 'action' => 'view', $questionsQuestionary['Question']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($questionsQuestionary['Questionary']['name'], array('controller' => 'questionaries', 'action' => 'view', $questionsQuestionary['Questionary']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $questionsQuestionary['QuestionsQuestionary']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $questionsQuestionary['QuestionsQuestionary']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $questionsQuestionary['QuestionsQuestionary']['id']), null, __('Deseja realmente excluir # %s?', $questionsQuestionary['QuestionsQuestionary']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Questions Questionary'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questionaries'), array('controller' => 'questionaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionary'), array('controller' => 'questionaries', 'action' => 'add')); ?> </li>
	</ul>
</div>
