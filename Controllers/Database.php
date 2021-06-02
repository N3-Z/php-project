<?php
    namespace Controllers;
    include dirname(__DIR__)."/Config/DB.php";
    use Config\DB;

    class Database {
        private $_con;
        private static $_instance;

        //singleton
        public static function getInstance(){
            if(!self::$_instance){
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        private function __construct(){
            $config = new DB();
            $this->_con = mysqli_connect(
                $config->db['host'],
                $config->db['user'],
                $config->db['password'],
                $config->db['database'],
                $config->db['port'],
            );
            if(mysqli_connect_error()){
                die("Error: ".mysqli_connect_error());
            }
        }

        public function getConnection(){
            return $this->_con;
        }
    }

?>
