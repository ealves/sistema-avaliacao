<div class="evaluationPeriods index">
	<h2><?php echo __('Períodos de Avaliação'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('start', 'Início'); ?></th>
			<th><?php echo $this->Paginator->sort('end', 'Término'); ?></th>
			<th class="actions"><?php echo __(''); ?></th>
	</tr>
	<?php foreach ($evaluationPeriods as $evaluationPeriod): ?>
	<tr>
		<td><?php echo h($evaluationPeriod['EvaluationPeriod']['id']); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('d/m/Y H:i', h($evaluationPeriod['EvaluationPeriod']['start'])); ?>&nbsp;</td>
		<td><?php echo $this->Time->format('d/m/Y H:i', h($evaluationPeriod['EvaluationPeriod']['end'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $evaluationPeriod['EvaluationPeriod']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $evaluationPeriod['EvaluationPeriod']['id'])); ?>
			<?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $evaluationPeriod['EvaluationPeriod']['id']), null, __('Deseja realmente excluir o período %s?', $evaluationPeriod['EvaluationPeriod']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Novo Período'), array('action' => 'add')); ?></li>
	</ul>
</div>
