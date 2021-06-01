<?php
    namespace Controllers;
    include dirname(__DIR__)."/Config/DB.php";
    use Config\DB;
    
    class Database {
        public function getConnection(){
            $config = new DB();

            
            $con = mysqli_connect(
                $config->db['host'],
                $config->db['user'],
                $config->db['password'],
                $config->db['database'],
                $config->db['port'],
            );
            
            if($con->connect_error){
                die("Connection error: " + $con->connect_error);
            }

            return $con;
        }
    }  
    
?>
