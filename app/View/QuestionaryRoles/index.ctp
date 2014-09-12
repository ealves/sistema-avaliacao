<div class="questionaryRoles index">
	<h2><?php echo __('Questionary Roles'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('questionary_id'); ?></th>
			<th><?php echo $this->Paginator->sort('role_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($questionaryRoles as $questionaryRole): ?>
	<tr>
		<td><?php echo h($questionaryRole['QuestionaryRole']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($questionaryRole['Questionary']['name'], array('controller' => 'questionaries', 'action' => 'view', $questionaryRole['Questionary']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($questionaryRole['Role']['name'], array('controller' => 'roles', 'action' => 'view', $questionaryRole['Role']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $questionaryRole['QuestionaryRole']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $questionaryRole['QuestionaryRole']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $questionaryRole['QuestionaryRole']['id']), null, __('Deseja realmente excluir # %s?', $questionaryRole['QuestionaryRole']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Questionary Role'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Questionaries'), array('controller' => 'questionaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionary'), array('controller' => 'questionaries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
	</ul>
</div>
