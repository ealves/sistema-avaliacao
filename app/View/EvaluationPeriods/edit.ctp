<div class="evaluationPeriods form">
<?php echo $this->Form->create('EvaluationPeriod'); ?>
	<fieldset>
		<legend><?php echo __('Edit Evaluation Period'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('start');
		echo $this->Form->input('end');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EvaluationPeriod.id')), null, __('Deseja realmente excluir # %s?', $this->Form->value('EvaluationPeriod.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Evaluation Periods'), array('action' => 'index')); ?></li>
	</ul>
</div>
