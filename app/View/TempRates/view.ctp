<div class="tempRates view">
<h2><?php  echo __('Temp Rate'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tempRate['TempRate']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Questionary'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tempRate['Questionary']['name'], array('controller' => 'questionaries', 'action' => 'view', $tempRate['Questionary']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Question'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tempRate['Question']['name'], array('controller' => 'questions', 'action' => 'view', $tempRate['Question']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subject'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tempRate['Subject']['name'], array('controller' => 'subjects', 'action' => 'view', $tempRate['Subject']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rate'); ?></dt>
		<dd>
			<?php echo h($tempRate['TempRate']['rate']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Temp Rate'), array('action' => 'edit', $tempRate['TempRate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Temp Rate'), array('action' => 'delete', $tempRate['TempRate']['id']), null, __('Deseja realmente excluir # %s?', $tempRate['TempRate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Temp Rates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Temp Rate'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questionaries'), array('controller' => 'questionaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionary'), array('controller' => 'questionaries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subjects'), array('controller' => 'subjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subject'), array('controller' => 'subjects', 'action' => 'add')); ?> </li>
	</ul>
</div>
