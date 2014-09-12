<div class="questions form">
<?php echo $this->Form->create('Question'); ?>
	<fieldset>
		<legend><?php echo __('Editar Pergunta'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name', array('label' => 'Pergunta'));
		echo $this->Form->input('status', array('label' => 'Ativo'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar')); ?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $this->Form->value('Question.id')), null, __('Deseja realmente excluir # %s?', $this->Form->value('Question.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Perguntas'), array('action' => 'index')); ?></li>
	</ul>
</div>
