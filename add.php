<?php
require_once 'helpers.php';
require_once 'db_helpers.php';

$con = db_connection($db_connect);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 $task = $_POST;
 $required_fileds = ['name_task','project'];
 $error_data = [];
 $task['user_id'] = 4;



    foreach ($task as $key => $value) {
        if (validateFilled($key)){
            if(in_array($key,$required_fileds)) {
                $task[$key] = $value;
            }
        } else {
            $error_data[$key] = 'Поле не заполнено';
        }
    }

    print_r($task);

  $sql = 'INSERT INTO task (`project_id`, `user_id`, `date_create`, `name_task` ) VALUES (, ?, ?, ?)';



$stmt = db_get_prepare_stmt($con, $sql, $task);
$res = mysqli_stmt_execute($stmt);

print_r($res);

if ($res) {
    $task_id = mysqli_insert_id($con);

    header("Location: index.php?id=". $task_id);
    }
    else {
        echo $res;
    }
}


$content = include_template('add_task.php',['project_array'=> get_projects($con, 4), 'task_array'=>get_tasks($con, 4, $product_id), 'show_complete_tasks'=>$show_complete_tasks, 'error_data' => $error_data]);
$layout = include_template('layout.php', ['title'=>'Главная - Дела в порядке', 'content'=> $content, 'user_name'=>'Константин', 'add_task_cat' => $add_task_cat]);
print $layout;



?>
