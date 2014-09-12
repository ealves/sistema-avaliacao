<div class="subjects form">
<?php echo $this->Form->create('Subject'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Matéria'); ?></legend>
	<?php
    echo $this->Form->input('name', array('label' => 'Matéria'));
    echo $this->Form->input('status', array('label' => 'Ativo', 'default' => true));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Adicionar')); ?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Matérias'), array('action' => 'index')); ?></li>
	</ul>
</div>
