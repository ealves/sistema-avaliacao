<div class="users index">
	<h2><?php echo __('Usuários'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name', 'Nome'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __(''); ?></th>
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
		<td><?php if($user['User']['status'])
                echo 'Ativo';
            else
                echo 'Inativo';?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $user['User']['id']), null, __('Deseja realmente excluir %s?', $user['User']['name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Página {:page} de {:pages}, exibindo {:current} registros de {:count} total, começando no {:start}, terminando no {:end}')
        ));
        ?>	</p>
	<div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('próximo') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
	</div>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Novo Usuário'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Importar Usuários'), array('action' => 'import')); ?></li>
		<li><?php echo $this->Html->link(__('Perfis de Acesso'), array('controller' => 'roles')); ?></li>
        <br/>
        <?php
        $grades = array_combine(range(1,10,1),range(1,10,1));?>
        <?php echo $this->Form->create('Users', array('action' => 'index', 'type' => 'get', 'class' => 'search')); ?>
        <?php echo $this->Form->input('q', array('label' => false, 'placeholder' => 'Nome', 'value' => $q)); ?>
        <?php echo $this->Form->input('course_id', array('label' => 'Curso', 'placeholder' => 'Curso', 'empty' => 'Selecione', 'value' => $course_id)); ?>
        <?php echo $this->Form->input('grade', array('label' => 'Período', 'placeholder' => 'Período', 'empty' => 'Todos', 'default' => $grade, 'options' => $grades)); ?>
        <?php echo $this->Form->end(__('Pesquisar')); ?>
	</ul>
</div>
