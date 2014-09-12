<div class="questions index">
	<h2><?php echo __('Perguntas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name', 'Pergunta'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __(''); ?></th>
	</tr>
	<?php foreach ($questions as $question): ?>
	<tr>
		<td><?php echo h($question['Question']['id']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['name']); ?>&nbsp;</td>
		<td><?php if($question['Question']['status'])
                echo 'Ativo';
            else
                echo 'Inativo';?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $question['Question']['id'])); ?>
			<?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $question['Question']['id']), null, __('Deseja realmente excluir %s?', $question['Question']['name'])); ?>
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
		<li><?php echo $this->Html->link(__('Nova Pergunta'), array('action' => 'add')); ?></li>
	</ul>
</div>
