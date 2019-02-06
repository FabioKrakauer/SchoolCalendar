<?php

$dir = realpath(__DIR__ . '/..');
require_once $dir.'/config/config.php';
require_once $dir.'/classes/Auth.class.php';
require_once $dir.'/classes/DB.class.php';
require_once $dir.'/classes/Assigment.class.php';

if(isset($_POST["tarefa"])){
    $db = new DB();
    $assigment = 0;
    $assigmentID = $_POST["tarefa"];
    $assigment = new Assigment($assigmentID);
    Auth::log("Deletou a tarefa ". $assigmentID . " - " . $assigment->getName() . " - " . $assigment->getDateConfirm());
    $db->query("DELETE FROM `assignment` WHERE `id`='$assigmentID'");
    
}
exit(header("Location: /calendario/view/login.php"));