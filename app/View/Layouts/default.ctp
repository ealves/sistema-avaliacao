<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CPA - Comissão Própria de Avaliação');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
        echo $this->Html->script('jquery.js');
        echo $this->Html->script('jquery.rating.js');
		echo $this->Html->css('cake.generic');
		echo $this->Html->css('jquery.rating');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $cakeDescription; ?></h1>
            <ul id="logged">

                <li>Olá, <?php echo $userData['name'];?></li><li>-</li><li><?php echo $this->Html->link('Sair', '/users/logout'); ?></li>
            </ul>
            <div id="nav-hd">
            <ul id="nav">
                <?php if($userData['role_id'] != 4):?>
                <li><?php echo $this->Html->link('Avaliação', '/evaluation'); ?></li>
                <li><?php echo $this->Html->link('Relatórios', '/dashboard'); ?></li>
                <?php if($userData['role_id'] != 3):?>
                <li><?php echo $this->Html->link('Períodos de Avaliação', '/evaluation_periods'); ?></li>
                <li><?php echo $this->Html->link('Questionários', '/questionaries'); ?></li>
                <li><?php echo $this->Html->link('Perguntas', '/questions'); ?></li>
                <li><?php echo $this->Html->link('Cursos', '/courses'); ?></li>
                <li><?php echo $this->Html->link('Matérias', '/subjects'); ?></li>
                <li><?php echo $this->Html->link('Usuários', '/users'); ?></li>
                <?php
                endif;
                endif;?>
                </ul>
            </div>
		</div>
		<div id="content">
            <div class="center">
			<?php echo $this->Session->flash(); ?>
            <?php echo $this->Session->flash('auth');
            if ( $userData['role_id'] == 4 ):
            ?>
            <h3>Curso: <?php echo $course['Course']['name'];?></h3>
            <?php
            endif;

            echo $this->fetch('content'); ?>
                </div>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php

    if ( $_SERVER['REMOTE_ADDR'] == '127.0.0.1')
        echo $this->element('sql_dump'); ?>
</body>
</html>
