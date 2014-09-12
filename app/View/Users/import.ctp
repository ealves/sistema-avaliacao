<div class="users form">
<h2><?php  echo __('Importar Usuários'); ?></h2>
    <?php
//    var_dump($userData['course_id']);
    echo $this->Form->create('Document', array('url' => array('controller' => 'users', 'action' => 'upload'),
        'enctype' => 'multipart/form-data'
    ));

    echo $this->Form->input('', array(
        'type' => 'file'
    ));
    echo $this->Form->end('Continuar');
    ?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Usuários'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Novo Usuário'), array('action' => 'add')); ?> </li>
	</ul>
</div>
