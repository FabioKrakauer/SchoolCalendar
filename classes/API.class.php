<?php


class API{

    public static function categoryName(){
        return ["1" => "Lição de casa", "2" => "Prova", "3" => "Atividade"];
    }
    public static function getMatters(){
        return [
            "1" => "Matematica",
            "2" => "História",
            "3" => "Geografia",
            "4" => "Educação Fisica",
            "5" => "Inglês",
            "6" => "Espanhol",
            "7" => "Religião",
            "8" => "Sociologia",
            "9" => "Física",
            "10" => "Química",
            "11" => "Biologia",
            "12" => "Filosofia",
            "13" => "Literatura",
            "14" => "Gramática",
            "15" => "Redação"
        ];
    }
    public static function getMatterByID($id){
        return API::getMatters()[$id];
    }
    public static function getCategoryByID($id){
        return API::categoryName()[$id];
    }
}