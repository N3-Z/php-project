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
            $db = Database::getInstance();
            $this->con = $db->getConnection();
        }

        public function getUserByID(int $id){
            $stmt = $this->con->prepare("select * from users where id=?");
            $stmt->bind_param("d", $id);
            $stmt->execute();

            $res = $stmt->get_result();
            $data[] = array();
            while($row = $res->fetch_assoc()) $data = $row;
            $stmt->close();
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
            $stmt->close();
            return $data;
        }

        // user model
        public function addUser(User $user){
            $stmt = $this->con->prepare("INSERT INTO Users (username, email, password) values (?,?,?)");
            $stmt->bind_param("sss", $user->username, $user->email, $user->password);
            $stmt->execute();
            $stmt->close(); 
        }

        // update using user model
        public function updateUser(User $user){
            // code
        }

        // delete user by id
        public function deleteUser(int $id){

        }
    }
?>