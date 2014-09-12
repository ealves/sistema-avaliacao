<div class="subjects form">
<?php echo $this->Form->create('Subject'); ?>
	<fieldset>
		<legend><?php echo __('Editar Matéria'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('label' => 'Matéria'));
		echo $this->Form->input('status', array('label' => 'Ativo'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Editar')); ?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $this->Form->value('Subject.id')), null, __('Deseja realmente excluir %s?', $this->Form->value('Subject.name'))); ?></li>
		<li><?php echo $this->Html->link(__('Matérias'), array('action' => 'index')); ?></li>
	</ul>
</div>
