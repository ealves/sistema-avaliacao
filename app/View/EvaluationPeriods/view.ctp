<div class="evaluationPeriods view">
<h2><?php  echo __('Período de Avaliação'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($evaluationPeriod['EvaluationPeriod']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Início'); ?></dt>
		<dd>
			<?php echo h($evaluationPeriod['EvaluationPeriod']['start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Término'); ?></dt>
		<dd>
			<?php echo h($evaluationPeriod['EvaluationPeriod']['end']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $evaluationPeriod['EvaluationPeriod']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $evaluationPeriod['EvaluationPeriod']['id']), null, __('Deseja realmente excluir o período %s?', $evaluationPeriod['EvaluationPeriod']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Todos'), array('action' => 'index')); ?> </li>
	</ul>
</div>
