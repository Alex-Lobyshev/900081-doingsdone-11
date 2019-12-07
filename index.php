<?php
require_once 'helpers.php';
require_once 'db_helpers.php';

// показывать или нет выполненные задачи
date_default_timezone_set('Europe/Moscow');
$show_complete_tasks = rand(0, 1);

$con = db_connection($db_connect);

$product_id = filter_input(INPUT_GET, 'cat_id');

if(isset($product_id)) {
    get_tasks($con, 4, $product_id);

}

$add_task_cat = include_template('add_task.php',['project_array'=> get_projects($con, 4)]);
$content = include_template('main.php',['project_array'=> get_projects($con, 4), 'task_array'=>get_tasks($con, 4, $product_id), 'show_complete_tasks'=>$show_complete_tasks, 'add_task_cat' => $add_task_cat]);
$layout = include_template('layout.php', ['title'=>'Главная - Дела в порядке', 'content'=> $content, 'user_name'=>'Константин', 'add_task_cat' => $add_task_cat]);
print $layout;



?>

