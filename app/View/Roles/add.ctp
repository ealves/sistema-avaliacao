<div class="roles form">
<?php echo $this->Form->create('Role'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Perfil'); ?></legend>
	<?php
		echo $this->Form->input('name', array('label' => 'Perfil'));
		echo $this->Form->input('role_status', array('label' => 'Ativo'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Adicionar')); ?>
</div>
<div class="actions">
    <ul>
        <li><?php echo $this->Html->link(__('Listar Perfis'), array('action' => 'index')); ?></li>
    </ul>
</div>