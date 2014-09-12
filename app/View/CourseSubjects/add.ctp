<div class="courseSubjects form">
<?php echo $this->Form->create('CourseSubject'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Matéria ao Curso'); ?></legend>
	<?php
		echo $this->Form->input('course_id', array('label' => 'Curso', 'default' => $course_id));
		echo $this->Form->input('subject_id', array('label' => 'Matéria', 'empty' => 'Selecione uma Matéria'));
		echo $this->Form->input('user_id', array('label' => 'Professor', 'empty' => 'Selecione um Professor'));
		echo $this->Form->input('grade', array('label' => 'Período'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Adicionar')); ?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Listar Cursos'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Curso'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Matérias'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Matéria'), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
	</ul>
</div>
