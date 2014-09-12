<h2>Avaliação</h2>
<form action="/evaluation/view">
<?php
//echo $this->Form->create();
echo $this->Form->input('course_id', array('options' => $courses, 'name' => 'course_id', 'label' => 'Curso', 'empty' => 'Selecione seu curso'));
$grades = array('Selecione seu período', 7 => 7);
echo $this->Form->input('grade', array('label' => 'Período', 'options' => $grades, 'name' => 'grade', 'default' => 0));
echo $this->Form->hidden('questionary_id', array('value' => $questionary['Questionary']['id'], 'name' => 'questionary_id'));
echo $this->Form->end(__('Iniciar Avaliação'));
/*foreach ($courses as $course):
    */?><!--
    <a href="/evaluation/view?course_id=<?php /*echo $course['Course']['id'];*/?>&questionary_id=<?php /*echo $questionary['Questionary']['id'];*/?>"><?php /*echo $course['Course']['name'];*/?></a>
-->

