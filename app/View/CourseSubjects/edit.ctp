<div class="courseSubjects form">
<?php echo $this->Form->create('CourseSubject'); ?>
	<fieldset>
		<legend><?php echo __('Editar Matéria do Curso'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('course_id', array('label' => 'Curso'));
		echo $this->Form->input('subject_id', array('label' => 'Matéria'));
		echo $this->Form->input('user_id', array('label' => 'Professor', 'empty' => 'Selecione um Professor'));
		echo $this->Form->input('grade', array('label' => 'Período'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Editar')); ?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $this->Form->value('CourseSubject.id')), null, __('Deseja realmente excluir %s?', $this->Form->value($this->request->data['Subject']['name']))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Cursos'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Curso'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Matérias'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nova Matéria'), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
	</ul>
</div>
