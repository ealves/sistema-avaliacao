<div class="questionaries form">
<?php echo $this->Form->create('Questionary'); ?>
	<fieldset>
		<legend><?php echo __('Editar Questionário'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('label' => 'Questinário'));
		echo $this->Form->input('status', array('label' => 'Ativo'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Editar')); ?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $this->Form->value('Questionary.id')), null, __('Deseja realmente excluir # %s?', $this->Form->value('Questionary.name'))); ?></li>
		<li><?php echo $this->Html->link(__('Questionários'), array('action' => 'index')); ?></li>
	</ul>
</div>
