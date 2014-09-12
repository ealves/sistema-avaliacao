<div class="questionaryQuestions index">
	<h2><?php echo __('Perguntas do Questionário'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('questionary_id'); ?></th>
			<th><?php echo $this->Paginator->sort('question_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($questionaryQuestions as $questionaryQuestion): ?>
	<tr>
		<td><?php echo h($questionaryQuestion['QuestionaryQuestion']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($questionaryQuestion['Questionary']['name'], array('controller' => 'questionaries', 'action' => 'view', $questionaryQuestion['Questionary']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($questionaryQuestion['Question']['name'], array('controller' => 'questions', 'action' => 'view', $questionaryQuestion['Question']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $questionaryQuestion['QuestionaryQuestion']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $questionaryQuestion['QuestionaryQuestion']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $questionaryQuestion['QuestionaryQuestion']['id']), null, __('Deseja realmente excluir # %s?', $questionaryQuestion['QuestionaryQuestion']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Questionary Question'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Questionaries'), array('controller' => 'questionaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionary'), array('controller' => 'questionaries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
