<div id="report">
<h2>Relatório - <?php echo $questionary['Questionary']['name'];?></h2>
<h1><?php echo isset($course['Course']['name']) ? $course['Course']['name'] . ' - ' : 'Todos cursos - ';?>
    <?php
    if($grade != ''):
        echo $grade?>º Período
    <?php else:
        echo 'Todos períodos';
    endif;?>
    </h1>
<?php if($questionary['Questionary']['subjects']):?>
<table >
    <thead>
    <tr>
        <th>Questões / Disciplinas</th>
        <?php foreach ( $subjects as $subject ):?>
        <th><?php echo $subject['Subject']['name'];?></th>
        <?php endforeach;?>
        <th>Média</th>
    </tr>
    </thead>
<?php
$i = 0;
$total = array();
foreach ( $questions as $question ):?>
    <tr>
        <td><?php echo $question['Question']['name'];?></td>
        <?php
        $count = 0;
        $questionAverage = 0;
        foreach ( $question['Question']['average'] as $average ):
            $questionAverage += $average;?>
            <td><?php
                if ( $average != '-' )
                    echo number_format($average, 1, ',', '.');
                else
                    echo $average;
                    ?></td>
        <?php
        $count++;
        endforeach;?>
        <td><?php
            $questionAverage = $questionAverage/count($question['Question']['average']);
            if($questionAverage > 0)
                echo number_format($questionAverage, 1, ',', '.');
            else
                echo '-';?></td>
    </tr>
<?php
$i++;
endforeach;?>
    <tr>
        <td>Subtotal</td>
    <?php
$i = 0;
foreach ( $subjects as $subject ):
    $subtotal = 0;
    $totalQuestions = 0;
    foreach ( $questions as $question ){
        if(isset($question['Question']['average'][$i]) AND $question['Question']['average'][$i] != '-')
        {
            $subtotal += $question['Question']['average'][$i];
            $totalQuestions++;
        }
    }
?>
<td><?php
    if ( $totalQuestions > 0 )
        echo number_format($subtotal/$totalQuestions, 1, ',', '.');
    else
        echo '-';
    ?></td>
<?php
$i++;
endforeach;?>
        <td>-</td>
    </tr>
</table>
<?php else:?>
    <table>
    <thead>
    <tr>
        <th>Perguntas</th>
        <th>Nota</th>
    </tr>
    </thead>
<?php foreach ( $questions as $question ):?>
    <tr>
        <td><?php echo $question['Question']['name'];?></td>
        <td><?php echo number_format($question[0]['Rate']/$question[0]['Votes'], 1, ',', '.');?></td>
    </tr>
    <?php
    $average[] = $question[0]['Rate']/$question[0]['Votes'];
endforeach;?>
    <tr>
        <td>Média por matéria</td>
        <td><?php
            if(isset($average))
                echo number_format(array_sum($average)/count($average), 1, ',', '.');
            else
                echo '-';
            ?></td>
    </tr>
</table>
<?php endif;
if($userData['role_id'] != 3):?>
    <a href="/dashboard/comments?period=<?php echo $period;?>&questionary_id=<?php echo $questionary['Questionary']['id'];?>&course_id=<?php echo $course['Course']['id'];?>&grade=<?php echo $grade;?>" class="next-question confirm">Visualizar Comentários</a>
<?php endif;?>
</div>