<div class="courseSubjects view">
<h2><?php  echo __('Course Subject'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($courseSubject['CourseSubject']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($courseSubject['Course']['name'], array('controller' => 'courses', 'action' => 'view', $courseSubject['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subject'); ?></dt>
		<dd>
			<?php echo $this->Html->link($courseSubject['Subject']['name'], array('controller' => 'subjects', 'action' => 'view', $courseSubject['Subject']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grade'); ?></dt>
		<dd>
			<?php echo h($courseSubject['CourseSubject']['grade']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Course Subject'), array('action' => 'edit', $courseSubject['CourseSubject']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Course Subject'), array('action' => 'delete', $courseSubject['CourseSubject']['id']), null, __('Deseja realmente excluir # %s?', $courseSubject['CourseSubject']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Course Subjects'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course Subject'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subjects'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject'), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
	</ul>
</div>
