<?php


$dir = realpath(__DIR__ . '/..');
require_once $dir.'/config/config.php';
require_once $dir.'/classes/DB.class.php';
require_once $dir.'/classes/API.class.php';

class Assigment{

    private $id;
    private $category;
    private $matter;
    private $description;
    private $lanced_date;
    private $date_confirm;

    function __construct($id){

        $db = new DB();
        $download = $db->query("SELECT * FROM `assignment` WHERE `id` = '$id'");
        if($row = $download->fetch()){
            $this->id = $row["id"];
            $this->category = $row["category"];
            $this->matter = $row["matter"];
            $this->description = $row["description"];
            $this->lanced_date = $row["lanced_date"];
            $this->date_confirm = $row["date_confirm"];
        }
    }
    function getID(){
        return $this->id;
    }
    function getCategory(){
        return $this->category;
    }
    function getMatter(){
        return $this->matter;
    }
    function getDescription(){
        return $this->description;
    }
    function getLancedDate(){
        return $this->lanced_date;
    }
    function getDateConfirm(){
        return $this->date_confirm;
    }
    function getName(){
        return API::getCategoryByID($this->getCategory()) . " de " . API::getMatterByID($this->getMatter());
    }
}