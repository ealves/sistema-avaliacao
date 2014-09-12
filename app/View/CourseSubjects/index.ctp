<div class="courseSubjects index">
	<h2><?php echo __('Course Subjects'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('course_id'); ?></th>
			<th><?php echo $this->Paginator->sort('subject_id'); ?></th>
			<th><?php echo $this->Paginator->sort('grade'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($courseSubjects as $courseSubject): ?>
	<tr>
		<td><?php echo h($courseSubject['CourseSubject']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($courseSubject['Course']['name'], array('controller' => 'courses', 'action' => 'view', $courseSubject['Course']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($courseSubject['Subject']['name'], array('controller' => 'subjects', 'action' => 'view', $courseSubject['Subject']['id'])); ?>
		</td>
		<td><?php echo h($courseSubject['CourseSubject']['grade']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $courseSubject['CourseSubject']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $courseSubject['CourseSubject']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $courseSubject['CourseSubject']['id']), null, __('Deseja realmente excluir # %s?', $courseSubject['CourseSubject']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Course Subject'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subjects'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject'), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
	</ul>
</div>
