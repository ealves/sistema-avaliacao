<div class="subjectsCourses view">
<h2><?php  echo __('Subjects Course'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($subjectsCourse['SubjectsCourse']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($subjectsCourse['Course']['name'], array('controller' => 'courses', 'action' => 'view', $subjectsCourse['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subject'); ?></dt>
		<dd>
			<?php echo $this->Html->link($subjectsCourse['Subject']['name'], array('controller' => 'subjects', 'action' => 'view', $subjectsCourse['Subject']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Subjects Course'), array('action' => 'edit', $subjectsCourse['SubjectsCourse']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Subjects Course'), array('action' => 'delete', $subjectsCourse['SubjectsCourse']['id']), null, __('Deseja realmente excluir # %s?', $subjectsCourse['SubjectsCourse']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Subjects Courses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subjects Course'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subjects'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject'), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
	</ul>
</div>
