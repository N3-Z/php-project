<?php
    namespace Controllers;
    
    include dirname(__FILE__)."/Database.php";
    use Controllers\Database;
  
    class UserController{
        
        public function getUserByID($id){
            $db = new Database();
            $con = $db->getConnection();
            $stmt = $con->prepare("select * from users where id=?");
            $stmt->bind_param("s", $id);
            $stmt->execute();

            $res = $stmt->get_result();
            $data[] = array();
            while($row = $res->fetch_assoc()) $data = $row;

            print_r($data);
        }

        public function getAllUser(){
            $db = new Database();
            $con = $db->getConnection();
            $stmt = $con->prepare("select * from users");
            $stmt->execute();

            $res = $stmt->get_result();
            $data[] = array();
            while($row = $res->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }

    }
    // $x = new UserController();
    // $res = $x->getAllUser();
    // print_r($res);
?>