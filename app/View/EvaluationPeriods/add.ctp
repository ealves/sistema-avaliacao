<div class="evaluationPeriods form">
<?php echo $this->Form->create('EvaluationPeriod'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Período de Avaliação'); ?></legend>
	<?php
		echo $this->Form->input('start');
		echo $this->Form->input('end');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Adicionar')); ?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Listar Todos'), array('action' => 'index')); ?></li>
	</ul>
</div>
