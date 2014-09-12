<div class="voters view">
<h2><?php  echo __('Voter'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($voter['Voter']['id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Voter'), array('action' => 'edit', $voter['Voter']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Voter'), array('action' => 'delete', $voter['Voter']['id']), null, __('Deseja realmente excluir # %s?', $voter['Voter']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Voters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Voter'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Temp Rates'), array('controller' => 'temp_rates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Temp Rate'), array('controller' => 'temp_rates', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Temp Rates'); ?></h3>
	<?php if (!empty($voter['TempRate'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Questionary Id'); ?></th>
		<th><?php echo __('Question Id'); ?></th>
		<th><?php echo __('Subject Id'); ?></th>
		<th><?php echo __('Rate'); ?></th>
		<th><?php echo __('Voter Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($voter['TempRate'] as $tempRate): ?>
		<tr>
			<td><?php echo $tempRate['id']; ?></td>
			<td><?php echo $tempRate['questionary_id']; ?></td>
			<td><?php echo $tempRate['question_id']; ?></td>
			<td><?php echo $tempRate['subject_id']; ?></td>
			<td><?php echo $tempRate['rate']; ?></td>
			<td><?php echo $tempRate['voter_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'temp_rates', 'action' => 'view', $tempRate['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'temp_rates', 'action' => 'edit', $tempRate['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'temp_rates', 'action' => 'delete', $tempRate['id']), null, __('Deseja realmente excluir # %s?', $tempRate['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Temp Rate'), array('controller' => 'temp_rates', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
