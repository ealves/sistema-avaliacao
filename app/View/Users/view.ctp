<div class="users view">
<h2><?php  echo __('Usuário'); ?></h2>
<!--    --><?php //var_dump($user);?>
	<dl>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Curso'); ?></dt>
        <dd>
            <?php echo $user['Course']['name']; ?>
            &nbsp;
        </dd>
		<dt><?php echo __('Grupo'); ?></dt>
		<dd>
			<?php echo h($user['Role']['name']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('R.A./Funcional'); ?></dt>
        <dd>
            <?php echo h($user['User']['funcional']); ?>
            &nbsp;
        </dd>
		<dt><?php echo __('Criado'); ?></dt>
		<dd>
			<?php echo $this->Time->format('d/m H\hi', $user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modificado'); ?></dt>
		<dd>
			<?php echo $this->Time->format('d/m H\hi', $user['User']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
            <?php if($user['User']['status'])
                echo 'Ativo';
            else
                echo 'Inativo';?>&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Editar Usuário'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Excluir Usuário'), array('action' => 'delete', $user['User']['id']), null, __('Deseja realmente excluir # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Usuários'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Usuário'), array('action' => 'add')); ?> </li>
	</ul>
</div>
