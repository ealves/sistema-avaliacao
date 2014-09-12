<script type="text/javascript">
$(document).ready(function(){
    $('#UserCourseId').parent().hide();
    $('#UserGrade').parent().hide();
    $('#UserRoleId').change(function(){
        if($(this).val().match('2|4'))
            $('#UserCourseId').parent().show();
        else
            $('#UserCourseId').parent().hide();
        if($(this).val().match('4'))
            $('#UserGrade').parent().show();
        else
            $('#UserGrade').parent().hide();
    });
});
</script>
<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Usuário'); ?></legend>
	<?php
        echo $this->Form->input('name', array('label' => 'Nome'));
        echo $this->Form->input('funcional', array('label' => 'Funcional / R.A.'));
        echo $this->Form->input('role_id', array('label' => 'Grupo', 'empty' => 'Selecione o grupo'));
        echo $this->Form->input('course_id', array('label' => 'Curso', 'empty' => 'Selecione o curso'));
        echo $this->Form->input('grade', array('options' => array_combine(range(1,10,1),range(1,10,1)),
        'name' => 'grade',
        'label' => 'Período',
        'empty' => 'Selecione o período',
        'default' => $grade));
        echo $this->Form->input('status', array('label' => 'Ativo'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Adicionar')); ?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Listar Usuários'), array('action' => 'index')); ?></li>
	</ul>
</div>
