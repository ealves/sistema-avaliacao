<h1>Início</h1>
<h2>Escolha seu curso</h2>
<?php
foreach ($courses as $course):?>
<a href="/pages/course/<?php echo $course['Course']['id'];?>"><?php echo $course['Course']['name'];?></a>
<?php endforeach;?>
