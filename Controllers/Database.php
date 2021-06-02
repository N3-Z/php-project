<?php
    namespace Controllers;
    include dirname(__DIR__)."/Config/DB.php";
    use Config\DB;
use mysqli;

class Database {
        private $con;
        

        public function __init(){
            $config = new DB();
            $this->con = mysqli_init();
            $this->con->options(MYSQLI_OPT_CONNECT_TIMEOUT,3);
            $this->con->real_connect(
                $config->db['host'],
                $config->db['user'],
                $config->db['password'],
                $config->db['database'],
                $config->db['port'],
            );
        }

        public function getConnection(){
            return $this->con;
        }

        // public function getConnection(){
            // $config = new DB();
            // $con = mysqli_connect(
            //     $config->db['host'],
            //     $config->db['user'],
            //     $config->db['password'],
            //     $config->db['database'],
            //     $config->db['port'],
            // );
            
            // if($con->connect_error){
            //     die("Connection error: " + $con->connect_error);
            // }
            
            // return $con;
        // }

    }

?>
