<div class="questionaries form">
<?php echo $this->Form->create('Questionary'); ?>
	<fieldset>
		<legend><?php echo __('Questionário'); ?></legend>
	<?php
		echo $this->Form->input('name', array('label' => 'Questionário'));
		echo $this->Form->input('status', array('label' => 'Ativo', 'default' => true));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Adicionar')); ?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Listar Questionários'), array('action' => 'index')); ?></li>
	</ul>
</div>
