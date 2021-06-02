<?php
namespace main;
include dirname(__FILE__)."/Controllers/UserController.php";
use Controllers\UserController;

$userController = new UserController();
$res = $userController->getAllUser();

print_r($res);

?>