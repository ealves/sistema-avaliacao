<div class="questions form">
<?php echo $this->Form->create('Question'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Pergunta'); ?></legend>
	<?php
    echo $this->Form->input('name', array('label' => 'Pergunta'));
    echo $this->Form->input('status', array('label' => 'Ativo', 'default' => true));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Adicionar')); ?>
</div>
<div class="actions">
	<ul>

		<li><?php echo $this->Html->link(__('Perguntas'), array('action' => 'index')); ?></li>
	</ul>
</div>
