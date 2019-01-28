<?php
    $dir = realpath(__DIR__ . '/..');
    require_once $dir.'/config/config.php';
    
    class DB{
        private $ip;
        private $port;
        private $database;
        private $user;
        private $pass;
        public $conn;
        public function __construct(){
            $file = json_decode(file_get_contents(APP_ROOT . "/database.json"), true);
            $this->ip = $file["ip"];
            $this->port = $file["port"];
            $this->database = $file["database"];
            $this->user = $file["user"];
            $this->pass = $file["password"];
            $dsn = "mysql:host=$this->ip;dbname=$this->database;port=$this->port";
            $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
            $this->conn = new PDO($dsn, $this->user, $this->pass);
            $this->conn->exec("set names utf8");
            
        }
        public function query($query){
            return $this->conn->query($query);
        }
        public function getConnection(){
            return $this->conn;
        }
        function execute($query){
            $stm = $this->conn->prepare($query);
            $stm->execute();
        }
        function isConnected(){
            return $this->conn != null;
        }
        function insertGetLastID($query){
            $stm = $this->conn->prepare($query);
            $stm->execute();
            return $this->conn->lastInsertId();
            
        }
    }
?>