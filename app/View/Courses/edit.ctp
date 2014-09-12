<div class="courses form">
<?php echo $this->Form->create('Course'); ?>
	<fieldset>
		<legend><?php echo __('Editar Curso'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('label' => 'Curso'));
		echo $this->Form->input('status', array('label' => 'Ativo'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Editar')); ?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Listar Cursos'), array('action' => 'index')); ?></li>
	</ul>
</div>
