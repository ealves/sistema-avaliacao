<div class="users form">
<h2><?php  echo __('Lista de Usuários'); ?></h2>
    <h4>Total de <?php echo count($users); ?> usuários</h4>
    <?php
    echo $this->Form->create('Document', array('url' => array('controller' => 'users', 'action' => 'upload')));

    echo $this->Form->input('course_id', array('options' => $courses,
        'name' => 'course_id',
        'label' => 'Curso',
        'empty' => 'Selecione um curso',
        'default' => $userData['course_id']));

    echo $this->Form->input('grade', array('options' => array_combine(range(1,10,1),range(1,10,1)),
        'name' => 'grade',
        'label' => 'Período',
        'empty' => 'Selecione o período',
        'default' => $grade));

    echo $this->Form->hidden('csv', array('value' => $filename));
    echo $this->Form->end('Adicionar todos');
    ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th>Nome</th>
            <th>R.A.</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo h($user['User']['name']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['password']); ?>&nbsp;</td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Usuários'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Usuário'), array('action' => 'add')); ?> </li>
	</ul>
</div>
