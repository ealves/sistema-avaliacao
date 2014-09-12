<h2><?php echo $question['Question']['name'];?></h2>
<?php foreach($subjects as $subject):?>
    <div class="subjects">
    <h3><?php echo $subject['Subject']['name'];?></h3>
<?php for($i = 1; $i <= 10; $i++):?>
<input type="radio" name="subject_<?php echo $subject['Subject']['id'];?>" class="star"/>
<?php endfor;?>
    </div>
<?php endforeach;?>
<?php if ( $questions_neighbors['prev'] != NULL ):?>
<a href="?question_id=<?php echo $questions_neighbors['prev']['Question']['id'];?>&course_id=<?php echo $course_id;?>">Pergunta Anterior</a>
<?php
endif;
if ( $questions_neighbors['next'] != NULL ):?>
<a href="?questionary_id=<?php echo $questionary_id;?>&question_id=<?php echo $questions_neighbors['next']['Question']['id'];?>&course_id=<?php echo $course_id;?>">Próxima Pergunta</a>
<?php else:?>
<a href="#">Continuar</a>
<?php endif;?>

