<?php
    class Conexion extends PDO{
        private $hostBd = "localhost";
        private $nameBd = "u613783108_Tasking";
        private $userBd = "root";
        private $passwordBd = "";
        private $portBd = "3308";

        public function __construct(){
            try{
                parent::__construct('mysql:host=' .$this->hostBd . ';dbname=' . $this->nameBd . ';charset=utf8; port=' . $this->portBd, $this->userBd, $this->passwordBd, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            }catch(PDOException $e){
                echo 'Error: ' . $e->getMessage();
                exit;
            }
        }
    }
?>