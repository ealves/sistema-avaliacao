<div class="questionaryRoles view">
<h2><?php  echo __('Questionary Role'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($questionaryRole['QuestionaryRole']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Questionary'); ?></dt>
		<dd>
			<?php echo $this->Html->link($questionaryRole['Questionary']['name'], array('controller' => 'questionaries', 'action' => 'view', $questionaryRole['Questionary']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo $this->Html->link($questionaryRole['Role']['name'], array('controller' => 'roles', 'action' => 'view', $questionaryRole['Role']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Questionary Role'), array('action' => 'edit', $questionaryRole['QuestionaryRole']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Questionary Role'), array('action' => 'delete', $questionaryRole['QuestionaryRole']['id']), null, __('Deseja realmente excluir # %s?', $questionaryRole['QuestionaryRole']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Questionary Roles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionary Role'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questionaries'), array('controller' => 'questionaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionary'), array('controller' => 'questionaries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
	</ul>
</div>
