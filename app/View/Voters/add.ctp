<div class="voters form">
<?php echo $this->Form->create('Voter'); ?>
	<fieldset>
		<legend><?php echo __('Add Voter'); ?></legend>
	<?php
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Voters'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Temp Rates'), array('controller' => 'temp_rates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Temp Rate'), array('controller' => 'temp_rates', 'action' => 'add')); ?> </li>
	</ul>
</div>
