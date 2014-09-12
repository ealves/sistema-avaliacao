<div class="questionaries view">
<h2><?php  echo __('Questionário'); ?></h2>

			<h3><?php echo h($questionary['Questionary']['name']); ?></h3>
			&nbsp;
    <dl>
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php
            $status = 'Inativo';
            if($questionary['Questionary']['status']) $status = 'Ativo';
            echo h($status); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Editar Questionário'), array('action' => 'edit', $questionary['Questionary']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Excluir Questionário'), array('action' => 'delete', $questionary['Questionary']['id']), null, __('Deseja realmente excluir %s?', $questionary['Questionary']['name'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Questionários'), array('action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Perguntas do Questionário'); ?></h3>
	<?php if (!empty($questionary['QuestionaryQuestion'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Pergunta'); ?></th>
		<th class="actions"><?php echo __(''); ?></th>
	</tr>
	<?php
		$i = 1;
		foreach ($questionary['QuestionaryQuestion'] as $questionaryQuestion):
//            var_dump($questionaryQuestion);?>
		<tr>
			<td><?php echo $i;?>) <?php echo $questionaryQuestion['Question']['name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'questionary_questions', 'action' => 'edit', $questionaryQuestion['id'])); ?>
				<?php echo $this->Form->postLink(__('Excluir'), array('controller' => 'questionary_questions', 'action' => 'delete', $questionaryQuestion['id'], $questionary['Questionary']['id']), null, __('Deseja excluir a pergunta %s do questinário?',  $i)); ?>
			</td>
		</tr>
	<?php
        $i++;
    endforeach; ?>
	</table>
<?php endif; ?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Adicionar Pergunta'), array('controller' => 'questionary_questions', 'action' => 'add', $questionary['Questionary']['id'])); ?> </li>
		</ul>
	</div>
</div>
