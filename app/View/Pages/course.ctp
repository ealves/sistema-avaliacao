<h2><?php echo $subejct['Subject']['name'];?></h2>
<?php
foreach ($courses as $course):?>
<a href="/pages/course/<?php echo $course['Course']['id'];?>"><?php echo $course['Course']['name'];?></a>
<?php endforeach;?>
