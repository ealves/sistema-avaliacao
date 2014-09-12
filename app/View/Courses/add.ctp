<div class="courses form">
<?php echo $this->Form->create('Course'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Curso'); ?></legend>
	<?php
		echo $this->Form->input('name', array('label' => 'Curso'));
		echo $this->Form->input('status', array('label' => 'Ativo', 'default' => true));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Adicionar')); ?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Listar Cursos'), array('action' => 'index')); ?></li>
	</ul>
</div>
