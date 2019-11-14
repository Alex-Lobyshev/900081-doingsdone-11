<?php
require_once 'helpers.php';
require_once 'config/db.php';



/*



if (!$link) {
    $error = mysqli_connect_error();
    print('Ошибка MySQL: '.$error);
} else {
    $sql = "SELECT p.`id`, p.`name`, COUNT(t.`id`) AS cnt_tasks FROM project p
        JOIN task t ON t.`project_id` = p.`id`
        GROUP BY p.`id`";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $project_array = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    else {
        $error = mysqli_connect_error();
    }

}


if (!$link) {
    $error = mysqli_connect_error();
    print('Ошибка MySQL: '.$error);
} else {
    $sql = "SELECT `id`, `name` FROM task";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $project_array = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    else {
        $error = mysqli_connect_error();
    }

}*/



// показывать или нет выполненные задачи
date_default_timezone_set('Europe/Moscow');
$show_complete_tasks = rand(0, 1);




/*$project_array = ['Входящие', 'Учеба', 'Работа', 'Домашние дела', 'Авто'];*/


$task_array = [
    [
        'task_name' => 'Собеседование в IT компании',
        'date_complete' => '03.11.2019',
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
        'date_complete' => '03.11.2019',
        'task_category' => 'Входящие',
        'is_complete' => false,
    ],
    [
        'task_name' => 'Купить корм для кота',
        'date_complete' => '03.11.2019',
        'task_category' => 'Домашние дела',
        'is_complete' => false,
    ],
    [
        'task_name' => 'Заказать пиццу',
        'date_complete' => null,
        'task_category' => 'Домашние дела',
        'is_complete' => true
    ]
];

/*function count_task($task_array,$category_name) {
    $count_task_number=0;
    foreach($task_array as $key => $value) {
        if(isset($value['task_category']) && $value['task_category'] === $category_name){
            $count_task_number += 1;
        }
    }

    return $count_task_number;
};*/

$content = include_template('main.php',['project_array'=> get_projects($db_connect, 4), 'task_array'=>$task_array, 'show_complete_tasks'=>$show_complete_tasks]);
$layout = include_template('layout.php', ['title'=>'Главная - Дела в порядке', 'content'=> $content, 'user_name'=>'Константин']);
print $layout;
?>
