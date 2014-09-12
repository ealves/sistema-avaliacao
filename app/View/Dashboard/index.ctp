<h2>Relatório</h2>
<form action="/dashboard/report">
<?php
echo $this->Form->input('period', array('label' => 'Relatórios',
    'options' => $periods, 'name' => 'period'));
echo $this->Form->input('questionary_id', array('label' => 'Questionário',
    'options' => $questionaries,
    'name' => 'questionary_id',
    'empty' => 'Selecione um questionário',
    'default' => 0));
echo $this->Form->input('course_id', array('options' => $courses,
    'name' => 'course_id',
    'label' => 'Curso',
    'empty' => 'Selecione um curso',
    'default' => $course_id));
echo $this->Form->input('grade', array('label' => 'Período',
    'options' => $grades,
    'name' => 'grade',
    'empty' => 'Todos'));
echo $this->Form->end(__('Gerar relatório'));