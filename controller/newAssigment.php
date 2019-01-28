<?php

$dir = realpath(__DIR__ . '/..');
require_once $dir.'/config/config.php';
require_once $dir.'/classes/DB.class.php';

if(isset($_POST["action"])){
    $db = new DB();
    $category = $_POST["category"];
    $matter = $_POST["matter"];
    $description = $_POST["description"];
    $date = $_POST["date"];
    $today = date("Y-m-d");
    $id = $db->insertGetLastID("INSERT INTO `assignment` (`id`, `category`, `matter`, `description`, `lanced_date`, `date_confirm`) VALUES (NULL, '$category', '$matter', '$description', '$today', '$date')");
    header("Location: /calendario/view/viewAssigment.php?tarefa=".$id);
}