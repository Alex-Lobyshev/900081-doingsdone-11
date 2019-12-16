<?php
require_once 'helpers.php';
require_once 'db_helpers.php';

$con = db_connection($db_connect);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error_data = []; // массив для сбора ошибок
    $_POST['user_id'] = 4; // принудительно задаем значение user_id так как пока нет авторизации
    $required_field = ['name_task','project_id'];//массив обязательных полей
    $_POST['file_path'] = $file_name;
    /*Проверка заполнения обязательных полей*/
    foreach ($required_field as $field) {
        if(empty($_POST[$field])){
            $error_data[$field] = 'Поле не заполнено';
        }elseif($_POST[$field] == 'name_task') {
            $name_task = $_POST[$field];
        }else{
            if($_POST[$field] == 'project_id'){
                $project_id = $_POST[$field];
            }
        }
    }

    if(count($error_data)){
        ///////
    }
    print_r($error_data);
    echo '<br>';
    print_r($_POST);


    $sql = 'INSERT INTO task (`project_id`, `user_id`, `date_create`, `name_task`, `file_path` ) VALUES ($project_id, $name_task, $_POST['user_id'], $_POST[`date_create`], $_POST[`file_path`])';
    $stmt = db_get_prepare_stmt($con, $sql, $_POST);
    $res = mysqli_stmt_execute($stmt);

    print_r($res);

    if ($res) {
        $task_id = mysqli_insert_id($con);

        header("Location: index.php?id=". $task_id);
    }
    else {
        echo $res;
    }

    $content = include_template('add_task.php',['project_array'=> get_projects($con, 4), 'task_array'=>get_tasks($con, 4, $product_id), 'show_complete_tasks'=>$show_complete_tasks, 'error_data' => $error_data]);
    $layout = include_template('layout.php', ['title'=>'Главная - Дела в порядке', 'content'=> $content, 'user_name'=>'Константин', 'add_task_cat' => $add_task_cat]);
    print $layout;

   /*
    print_r($error_data);
   if(isset($_POST['name_task'])) {
       $name_task = $_POST['name_task'];
   } else {
       $error_data['name_task'] = 'Поле не заполнено';
   }

    if(isset($_POST['project_id'])) {
        $project_id= $_POST['project_id'];
    } else {
        $error_data['project_id'] = 'Поле не заполнено';
    }

    print_r($error_data);
    print_r(2);
   echo "<br>";
   print_r($_POST);
    echo "<br>";
    print ($name_task);

    if (empty($error_data)){

}*/




}
?>
