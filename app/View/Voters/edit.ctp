<div class="voters form">
<?php echo $this->Form->create('Voter'); ?>
	<fieldset>
		<legend><?php echo __('Edit Voter'); ?></legend>
	<?php
		echo $this->Form->input('id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Voter.id')), null, __('Deseja realmente excluir # %s?', $this->Form->value('Voter.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Voters'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Temp Rates'), array('controller' => 'temp_rates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Temp Rate'), array('controller' => 'temp_rates', 'action' => 'add')); ?> </li>
	</ul>
</div>
