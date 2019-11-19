<?php
require_once 'helpers.php';
require_once 'db_helpers.php';
require_once 'config/db.php';

// показывать или нет выполненные задачи
date_default_timezone_set('Europe/Moscow');
$show_complete_tasks = rand(0, 1);

db_connection($db_connect);


$content = include_template('main.php',['project_array'=> get_projects($slon, 4), 'task_array'=>get_tasks($link, 4), 'show_complete_tasks'=>$show_complete_tasks]);
$layout = include_template('layout.php', ['title'=>'Главная - Дела в порядке', 'content'=> $content, 'user_name'=>'Константин']);
print $layout;
?>
