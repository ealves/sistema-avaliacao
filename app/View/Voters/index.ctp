<div class="voters index">
	<h2><?php echo __('Voters'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($voters as $voter): ?>
	<tr>
		<td><?php echo h($voter['Voter']['id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $voter['Voter']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $voter['Voter']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $voter['Voter']['id']), null, __('Deseja realmente excluir # %s?', $voter['Voter']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Voter'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Temp Rates'), array('controller' => 'temp_rates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Temp Rate'), array('controller' => 'temp_rates', 'action' => 'add')); ?> </li>
	</ul>
</div>
