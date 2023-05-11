<?php 
namespace App\Controller;
use App\Model\User;



class UserController{

    public static function login($post){
        $erreurs = [];
        $email = filter_var($post["email"],FILTER_VALIDATE_EMAIL);

        if($email == false){
            $erreurs +=["email"=>"email invalide"];
        }

        $user = User::checkEmail($email);

        $password = password_hash($post["password"], PASSWORD_ARGON2ID);

        if(password_verify($password, $user["password"])==true){
            session_start();

            $_SESSION["lastname"] = $user["lastname"];
            $_SESSION["role"] = $user["admin"];
        }
    }

    public static function register($post){


        $firstname= null;

        $lastname = null;


        if(empty($post["email"]) || empty($post["password"]) || empty($post["birthday"])){
            echo "formulaire incomplet";
        }

        if(!empty($post["firstname"])){
            $firstname = strip_tags($post["firstname"]);
        }

        if(!empty($post["lastname"])){
            $lastname = strip_tags($post["lastname"]);
        }



        $email = filter_var($post["email"],FILTER_VALIDATE_EMAIL);

        if(User::checkEmail($email) != false){
            echo "email existant";
        }
        if($email == false){
            echo "rentrer un mail valide";
        }

        $password = password_hash($post["password"],PASSWORD_ARGON2ID);




        $user = new User($firstname,$lastname,$email,$password,$post["birthday"],false);

        $user->insert();
    }

}


?>