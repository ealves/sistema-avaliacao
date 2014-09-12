<div class="courses view">
<h2><?php  echo __('Curso'); ?></h2>
    <h3><?php echo h($course['Course']['name']); ?></h3>
    <dl>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php
            if($course['Course']['status'])
                echo 'Ativo';
            else
                echo 'Inativo';?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Editar Curso'), array('action' => 'edit', $course['Course']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Excluir Curso'), array('action' => 'delete', $course['Course']['id']), null, __('Deseja realmente excluir # %s?', $course['Course']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Cursos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Curso'), array('action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Matérias do Curso'); ?></h3>
	<?php if (!empty($course['CourseSubject'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Matéria'); ?></th>
		<th><?php echo __('Professor'); ?></th>
		<th><?php echo __('Período'); ?></th>
		<th class="actions"><?php echo __(''); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($course['CourseSubject'] as $courseSubject):
            //var_dump($courseSubject);?>
		<tr>
			<td><?php echo $courseSubject['Subject']['name']; ?></td>
			<td><?php if(isset($courseSubject['User']['name'])) echo $courseSubject['User']['name']; ?></td>
			<td><?php echo $courseSubject['grade']; ?></td>
			<td class="actions">
				<?php echo  $this->Html->link(__('Editar'), array('controller' => 'course_subjects', 'action' => 'edit', $courseSubject['id'])); ?>
				<?php echo $this->Form->postLink(__('Excluir'), array('controller' => 'course_subjects', 'action' => 'delete', $courseSubject['id']), null, __('Deseja realmente excluir %s?', $courseSubject['Subject']['name'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Incluir Matéria'), array('controller' => 'course_subjects', 'action' => 'add', $course['Course']['id'])); ?> </li>
		</ul>
	</div>
</div>
