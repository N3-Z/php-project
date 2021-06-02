<?php
    namespace Controllers;
    
    include dirname(__FILE__)."/Database.php";
    use Controllers\Database;

    include dirname(__DIR__)."/Models/User.php";
    use Models\User;
  
    class UserController{
        public $con;
        
        public function __construct()
        {
            $db = new Database();
            $this->con = $db->getConnection();
        }

        public function getUserByID($id){
            $stmt = $this->con->prepare("select * from users where id=?");
            $stmt->bind_param("s", $id);
            $stmt->execute();

            $res = $stmt->get_result();
            $data[] = array();
            while($row = $res->fetch_assoc()) $data = $row;

            print_r($data);
        }

        public function getAllUser(){
            $stmt = $this->con->prepare("select * from users");
            $stmt->execute();

            $res = $stmt->get_result();
            $data[] = array();
            while($row = $res->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }

        // user model
        public function addUser($user){
            
        }

    }
    // $x = new UserController();
    // $res = $x->getAllUser();


    // $x->con->close();
    // print_r($res);
?>