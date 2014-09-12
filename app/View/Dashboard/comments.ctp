<div id="report">
<h2>Comentários - <?php echo $questionary['Questionary']['name'];?></h2>
<h1><?php echo $course['Course']['name'];?> - <?php echo $grade != '' ? $grade . 'º Período' : 'Todos períodos';?></h1>
<table>
    <thead>
    <tr>
        <th>Comentário</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($comments as $c):?>
    <tr>
        <td><?php echo $c['Comments']['comment'];?></td>
    </tr>
    <?php endforeach;?>
    </tbody>
    </table>
</div>