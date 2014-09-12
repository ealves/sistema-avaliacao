<div class="subjects view">
<h2><?php  echo __('Matéria'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($subject['Subject']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Matéria'); ?></dt>
		<dd>
			<?php echo h($subject['Subject']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($subject['Subject']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Editar Matéria'), array('action' => 'edit', $subject['Subject']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Excluir Matéria'), array('action' => 'delete', $subject['Subject']['id']), null, __('Deseja realmente excluir %s?', $subject['Subject']['name'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Matérias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Matéria'), array('action' => 'add')); ?> </li>
	</ul>
</div>
<!--<div class="related">
	<h3><?php echo __('Related Rates'); ?></h3>
	<?php if (!empty($subject['Rate'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Voter Id'); ?></th>
		<th><?php echo __('Question Id'); ?></th>
		<th><?php echo __('Subject Id'); ?></th>
		<th><?php echo __('Rate'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($subject['Rate'] as $rate): ?>
		<tr>
			<td><?php echo $rate['id']; ?></td>
			<td><?php echo $rate['voter_id']; ?></td>
			<td><?php echo $rate['question_id']; ?></td>
			<td><?php echo $rate['subject_id']; ?></td>
			<td><?php echo $rate['rate']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'rates', 'action' => 'view', $rate['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'rates', 'action' => 'edit', $rate['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'rates', 'action' => 'delete', $rate['id']), null, __('Deseja realmente excluir # %s?', $rate['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Rate'), array('controller' => 'rates', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>-->
