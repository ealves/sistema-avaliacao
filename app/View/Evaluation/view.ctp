<script type="text/javascript">
$(document).ready(function(){
    var evaluation_period_id = <?php echo $this->Session->read('evaluation_period_id');?>;
    var grade = '';
    var course_id = '';
    <?php if ( $userData['role_id'] == 4 ):?>
    grade = <?php echo $userData['grade'];?>;
    <?php endif;
    if ( $userData['role_id'] == 4 ):?>
    course_id = <?php echo $userData['course_id'];?>;
    <?php endif;?>

    $('input.rates').rating({

        callback: function(value){
            var subject = $(this);

            subject.parent().find('a.nsa').removeClass('checked');

            var id = subject.parent().attr('id');
            var subject_s = subject.attr('name').split('_');
            //console.log($(this).val());

            var data = {subject_id: subject_s[1], questionary_id: subject_s[2], question_id: subject_s[3], rate: value};

            //console.log(subject_s[4]);
            if(id != 'undefined'){
                data['id'] = id;
            }

            data['grade'] = grade;
            data['course_id'] = course_id;
            data['evaluation_period_id'] = evaluation_period_id;

            //console.log(data);

            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: data,
                url: "/ajax/rate",
                success: function(data){
                    //alert(value);
//                    $('input[name="subject_' + subject_s[1] + '_' + subject_s[2] + '_' + subject_s[3] + '_' + subject_s[4] + '"]').attr('id', data);
                    if(data != null)
                        subject.parent().attr('id', data);
                },
                error: function(){
                    alert('Erro na avaliação. Por favor, tente novamente.');
                }
            });
        }
    });

    <?php if($questionaries_neighbors):?>
    $('.next-question').click(function(){
        var link = $(this);

        var questions = [];
        if($('tr.question').length > 0)
        {
            $.each($('tr.question'), function(){
                var td = $(this).find('td:last-child');
                console.log(td.attr('id'));
                if(td.attr('id') == undefined && td.find('input').length > 1){
                    questions.push(td.parent().attr('id'));
                }
            });
        }

        if ( questions.length > 0 ){
            alert('Para continuar avalie a(s) matéria(s): ' + questions.join(', '));
        }else{
            var comment = $('.type_question_2').val();
            var subject_s = $('.type_question_2').attr('name').split('_');
            var data = {comment: comment, questionary_id: subject_s[2], question_id: subject_s[3]};
            data['grade']     = grade;
            data['course_id'] = course_id;
            data['evaluation_period_id'] = evaluation_period_id;

            if(comment != ''){
                $.ajax({
                    type: 'POST',
                    data: data,
                    url: "/ajax/comment",
                    success: function(){
                        window.location.href = link.attr('href');
                    },
                    error: function(){
                        alert('Erro na avaliação. Por favor, tente novamente.');
                    }
                });
            }else{
                window.location.href = link.attr('href');
            }
        }
        return false;
    });
    <?php else:?>
    $('.confirm').click(function(){
        var comment = $('.type_question_2').val();
        var subject_s = $('.type_question_2').attr('name').split('_');

        var questions = [];
        $.each($('tr.question'), function(){
            var td = $(this).find('td:last-child');
            console.log(td.attr('id'));
            if(td.attr('id') == undefined && td.find('input').length > 1){
                questions.push(td.parent().attr('id'));
            }
        });

        if ( questions.length > 0 ){
            alert('Para finalizar avalie a(s) pergunta(s): ' + questions.join(', '));
        }else{
            $(this).text('Aguarde...');
            if ( comment != '' ){
                var data = {comment: comment, questionary_id: subject_s[2], question_id: subject_s[3]};
                data['grade']     = grade;
                data['course_id'] = course_id;
                data['evaluation_period_id'] = evaluation_period_id;
                $.ajax({
                    type: 'POST',
                    data: data,
                    url: "/ajax/comment",
                    success: function(){
                        validateVotes();
                    },
                    error: function(){
                        alert('Erro na avaliação. Por favor, tente novamente.');
                    }
                });
            }else{
                validateVotes();
            }

        }
        return false;
    });
    <?php endif;?>

    $('.nsa').click(function(){
        var nsa = $(this);
        var subject = $(this).prev();
        nsa.parent().find('.star-rating-live').removeClass('star-rating-on');
        var id = subject.parent().attr('id');
        var subject_s = subject.attr('name').split('_');

        var data = {subject_id: subject_s[1], questionary_id: subject_s[2], question_id: subject_s[3], rate: null};

        console.log(subject_s[4]);
        if(id != 'undefined')
            data['id'] = id;

        console.log(data);

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: data,
            url: "/ajax/rate",
            success: function(data){
                if(data != null)
                    subject.parent().attr('id', data);
                nsa.addClass('checked');
            },
            error: function(){
                alert('Erro na avaliação. Por favor, tente novamente.');
            }
        });
        return false;
    });

    $('.rating-cancel').remove();

    /*$('.next-question').click(function(){
        var rate = [];
        $('.subjects').each(function(){
             var rate = $(this)
        })
    });*/

});
function validateVotes(){
    $('a.confirm').text('Validando avaliação...');
    $.ajax({
        async: true,
        type: 'POST',
        url: "/ajax/validateVotes",
        success: function(){
//            window.location.href = '/users/logout';
            window.location.href = 'https://docs.google.com/forms/d/1AxxDUbL4lDKKxFWpuJVEjRVHlP8zUQKqPH8-Q7SEiK8/viewform';
        },
        error: function(){
            alert('Erro na validação. Por favor, tente novamente.');
        }
    });
    return false;
}
</script>
<?php //var_dump($questionary);?>
<div id="evaluation">
    <?php
    /*echo $this->Session->read('Hash');
    var_dump($this->Session->read('idUser'));*/
    $semestre = 1;
    if ( date('m') > 6 )
        $semestre = 2;
    ?>
<h1>Avaliação: <b><?php echo $questionary['Questionary']['name'];?></b>
<?php if($questionary['Questionary']['subjects']):?>
 - <?php echo $semestre;?>º Semestre de <?php echo date('Y');?> - Turma <?php echo $userData['grade'];?>º Período
<?php endif;?>
</h1>
<table id="legend">
    <thead>
    <tr><th colspan="6">Legenda</th></tr>
    <tr class="label">
        <th>Ruim</th>
        <th>Regular</th>
        <th>Bom</th>
        <th>Muito Bom</th>
        <th>Excelente</th>
        <th>NSA</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>0 a 2</td>
        <td>3 ou 4</td>
        <td>5 ou 6</td>
        <td>7 ou 8</td>
        <td>9 ou 10</td>
        <td>Não se aplica</td>
    </tr>
    </tbody>
</table>
<?php
//var_dump($questionary_id);
if ( $questionary_id == 1 ):?>
    <h4><?php echo CakeSession::read('question_number');?> / <?php echo $questionsCount;?></h4>
    <h2><?php echo CakeSession::read('question_number');?>) <?php echo $question['Question']['name'];?></h2>
    <?php
    if($question['Question']['type_id'] == 1):
        ?>
    <table>
        <thead>
        <tr>
            <th>Matéria</th>
            <th>Professor(a)</th>
            <th>Nota</th>
        </tr>
        </thead>
<?php
    $count = 1;
    foreach($subjects as $subject):
//    var_dump($subject);
    ?>
    <tr class="question" id="<?php echo $count;?>">
        <td><?php echo $count;?>) <?php echo $subject['Subject']['name'];?></td>
        <td><?php
            if( isset($subject['User']['name']) ){
            $subject['User']['name'] = explode(' ', $subject['User']['name']);
            echo __(' %s', implode(' ', array($subject['User']['name'][0], $subject['User']['name'][1])));
            };
            ?>
        </td>
        <td>
        <?php for($i = 0; $i <= 10; $i++):?>
            <input type="radio" value="<?php echo $i;?>" name="subject_<?php echo $subject['Subject']['id'];?>_<?php echo $questionary_id;?>_<?php echo $question['Question']['id'];?>" class="rates"/>
        <?php endfor;?>
            <a href="#" class="actions nsa" title="Não se aplica">NSA</a>
        </td>
    </tr>
<?php
    $count++;
    endforeach;
else:
?>
    <textarea name="subject_0_<?php echo $questionary_id;?>_<?php echo $question['Question']['id'];?>" class="type_question_<?php echo $question['Question']['type_id'];?>"></textarea></td>
        <?php endif;?>
    </table>
<?php if ( $questions_neighbors['prev'] != NULL ):?>
    <!--<a href="?questionary_id=<?php /*echo $questionary_id;*/?>&question_id=<?php /*echo $questions_neighbors['prev']['Question']['id'];*/?>&course_id=<?php /*echo $course_id;*/?>&grade=<?php /*echo $grade;*/?>">Pergunta Anterior</a>-->
<?php
endif;
    //var_dump($questions_neighbors);
if ( $questions_neighbors['next'] != NULL AND $questions_neighbors['next']['Question']['id'] != $question['Question']['id']):?>
    <a href="?questionary_id=<?php echo $questionary_id;?>&question_id=<?php echo $questions_neighbors['next']['Question']['id'];?>&course_id=<?php echo $course_id;?>&grade=<?php echo $grade;?>" class="next-question">Próxima Pergunta</a>
<?php else:?>
    <a href="/evaluation/view/<?php echo $questionaries_neighbors['QuestionaryRole']['questionary_id'];?>" class="next-question">Próxima Avaliação</a>
<?php endif;?>
<?php else:?>
    <table>
        <thead>
        <tr>
            <th>Questões</th>
            <th>Nota</th>
        </tr>
        </thead>
        <?php
        $count = 1;
        foreach($questions as $question):?>
            <tr class="question" id="<?php echo $count;?>">
                <td><?php echo $count;?>) <?php echo $question['Question']['name'];
                    if ( $question['Question']['type_id'] == 2 ):
                    ?>
                    <textarea name="subject_0_<?php echo $questionary_id;?>_<?php echo $question['Question']['id'];?>" class="type_question_<?php echo $question['Question']['type_id'];?>"></textarea></td>
                    <?php endif;?>
                <td>
                    <?php
                    if ( $question['Question']['type_id'] == 1 ):
                    for($i = 0; $i <= 10; $i++):?>
                        <input type="radio" value="<?php echo $i;?>" name="subject_0_<?php echo $questionary_id;?>_<?php echo $question['Question']['id'];?>" class="rates"/>
                    <?php endfor;?>
                        <a href="#" class="actions nsa" title="Não se aplica">NSA</a>
                    <?php endif;?>
                </td>
            </tr>
        <?php
            $count++;
        endforeach;?>
    </table>
    <?php
    if($questionaries_neighbors != NULL):?>
        <a href="/evaluation/view/<?php echo $questionaries_neighbors['QuestionaryRole']['questionary_id'];?>" class="next-question">Próxima Avaliação</a>
    <?php else:?>
        <a href="/evaluation" class="next-question confirm">Finalizar Avaliação</a>
    <?php endif;?>
<?php endif;?>

</div>