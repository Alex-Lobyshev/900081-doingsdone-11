<?php
require_once 'helpers.php';
// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

$project_array = ['Входящие', 'Учеба', 'Работа', 'Домашние дела', 'Авто'];


$task_array = [
    [
        'task_name' => 'Собеседование в IT компании',
        'date_complete' => '01.12.2019',
        'task_category' => 'Работа',
        'is_complete' => false,
    ],
    [
        'task_name' => 'Выполнить тестовое задание',
        'date_complete' => '25.12.2019',
        'task_category' => 'Работа',
        'is_complete' => false,
    ],
    [
        'task_name' => 'Сделать задание первого раздела',
        'date_complete' => '21.12.2019',
        'task_category' => 'Учеба',
        'is_complete' => true,
    ],
    [
        'task_name' => 'Встреча с другом',
        'date_complete' => '22.12.2019',
        'task_category' => 'Входящие',
        'is_complete' => false,
    ],
    [
        'task_name' => 'Купить корм для кота',
        'date_complete' => null,
        'task_category' => 'Домашние дела',
        'is_complete' => false,
    ],
    [
        'task_name' => 'Заказать пиццу',
        'date_complete' => null,
        'task_category' => 'Домашние дела',
        'is_complete' => false,
    ]
];


function count_task($task_array,$category_name) {
    $count_task_number=0;
    foreach($task_array as $key => $value) {
        if(isset($value['task_category']) && $value['task_category'] === $category_name){
            $count_task_number += 1;
        }
    }

    return $count_task_number;
};

$content = include_template('main.php',['project_array'=>$project_array, 'task_array'=>$task_array, 'show_complete_tasks'=>$show_complete_tasks]);
$layout = include_template('layout.php', ['title'=>'Главная - Дела в порядке', 'content'=> $content, 'user_name'=>'Константин']);
print $layout;
?>
