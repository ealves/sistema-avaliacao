<div class="questionaries index">
	<h2><?php echo __('Questionários'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name', 'Questionário'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __(''); ?></th>
	</tr>
	<?php foreach ($questionaries as $questionary): ?>
	<tr>
		<td><?php echo h($questionary['Questionary']['name']); ?>&nbsp;</td>
		<td><?php if($questionary['Questionary']['status'])
                echo 'Ativo';
            else
                echo 'Inativo';?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $questionary['Questionary']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $questionary['Questionary']['id'])); ?>
			<?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $questionary['Questionary']['id']), null, __('Deseja realmente excluir # %s?', $questionary['Questionary']['id'])); ?>
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
        <li><?php echo $this->Html->link(__('Novo Questionário'), array('action' => 'add')); ?></li>
    </ul>
</div>
