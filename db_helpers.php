<?php
require_once 'config/db.php';

$db_data = $db_connect;

function db_connection($db_data){

    $link = mysqli_connect($db_data['host'], $db_data['user'], $db_data['password'], $db_data['database']);
    mysqli_set_charset($link, 'utf8');


    if (!$link) {
        $error = mysqli_connect_error();
        print ('Ошибка MySQL' . $error);
    } else {
        print_r($link);
        return $link;
    }
}

