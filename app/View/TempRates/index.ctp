<div class="tempRates index">
	<h2><?php echo __('Temp Rates'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('questionary_id'); ?></th>
			<th><?php echo $this->Paginator->sort('question_id'); ?></th>
			<th><?php echo $this->Paginator->sort('subject_id'); ?></th>
			<th><?php echo $this->Paginator->sort('rate'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tempRates as $tempRate): ?>
	<tr>
		<td><?php echo h($tempRate['TempRate']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tempRate['Questionary']['name'], array('controller' => 'questionaries', 'action' => 'view', $tempRate['Questionary']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($tempRate['Question']['name'], array('controller' => 'questions', 'action' => 'view', $tempRate['Question']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($tempRate['Subject']['name'], array('controller' => 'subjects', 'action' => 'view', $tempRate['Subject']['id'])); ?>
		</td>
		<td><?php echo h($tempRate['TempRate']['rate']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tempRate['TempRate']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tempRate['TempRate']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tempRate['TempRate']['id']), null, __('Deseja realmente excluir # %s?', $tempRate['TempRate']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Temp Rate'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Questionaries'), array('controller' => 'questionaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionary'), array('controller' => 'questionaries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subjects'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject'), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
	</ul>
</div>
