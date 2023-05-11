<?php 
use App\Controller\UserController;

require_once("../autoloader.php");

if(isset($_GET["route"])){

    if($_GET["route"] == "register"){

        UserController::register($_POST);
    }
}


?>