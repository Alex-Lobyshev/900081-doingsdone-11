<?php
require_once 'helpers.php';
require_once 'db_helpers.php';

$con = db_connection($db_connect);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 $task = $_POST;

 foreach ($task as $key) {
     echo $key;
     echo '<br>';
 }

 $filename = uniqid() . '.jpg';
 $task[file] = $filename;
 move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/'. $filename);

$sql = 'INSERT INTO task (`project_id`, `user_id`, `date_create`, `name_task`, `file_path` ) VALUES (111, 4, NOW(), 2, 2)';



$stmt = db_get_prepare_stmt($con, $sql, $task);
$res = mysqli_stmt_execute($stmt);

if ($res) {
    $task_id = mysqli_insert_id($con);

    header("Location: index.php?id=". $task_id);
    }
    else {
        echo 'fiasko';
    }



    $required_fileds = [];
}


$content = include_template('add_task.php',['project_array'=> get_projects($con, 4), 'task_array'=>get_tasks($con, 4, $product_id), 'show_complete_tasks'=>$show_complete_tasks, 'add_task_cat' => $add_task_cat]);
$layout = include_template('layout.php', ['title'=>'Главная - Дела в порядке', 'content'=> $content, 'user_name'=>'Константин', 'add_task_cat' => $add_task_cat]);
print $layout;



?>
