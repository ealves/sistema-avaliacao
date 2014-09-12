<div class="subjectsCourses index">
	<h2><?php echo __('Subjects Courses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('course_id'); ?></th>
			<th><?php echo $this->Paginator->sort('subject_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($subjectsCourses as $subjectsCourse): ?>
	<tr>
		<td><?php echo h($subjectsCourse['SubjectsCourse']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($subjectsCourse['Course']['name'], array('controller' => 'courses', 'action' => 'view', $subjectsCourse['Course']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($subjectsCourse['Subject']['name'], array('controller' => 'subjects', 'action' => 'view', $subjectsCourse['Subject']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $subjectsCourse['SubjectsCourse']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $subjectsCourse['SubjectsCourse']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $subjectsCourse['SubjectsCourse']['id']), null, __('Deseja realmente excluir # %s?', $subjectsCourse['SubjectsCourse']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Subjects Course'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subjects'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject'), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
	</ul>
</div>
