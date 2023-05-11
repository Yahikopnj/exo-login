<?php 

namespace App\Model;
use App\Model\DAO;
use \PDOException;

class User{

    private $lastname;
    private $firstname;
    private $email;
    private $password;
    private $birthday;

    private $admin;


    function __construct($lastname, $firstname, $email, $password, $birthday, $admin)
    {
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->password = $password;
        $this->birthday = $birthday;
        $this->admin = $admin;

    }


    public function getLastname()
    {
        return $this->lastname;
    }

   
    public function setLastname($lastname)
    {
        
        $this->lastname = $lastname;

    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

    }

    
    public function getEmail()
    {
        return $this->email;
    }

    
    public function setEmail($email)
    {
        $this->email = $email;
    }

     
    public function getPassword()
    {
        return $this->password;
    }

   
    public function setPassword($password)
    {  
        $this->password = $password;
    }

    /**
     * Get the value of birthday
     */ 
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set the value of birthday
     *
     * @return  self
     */ 
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get the value of admin
     */ 
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * Set the value of admin
     *
     * @return  self
     */ 
    public function setAdmin($admin)
    {
        $this->admin = $admin;

        return $this;
    }


    
    public function insert(){
        try{

            $dao = new DAO();
            $dbh = $dao->getDbh();

           $stmt =  $dbh->prepare("INSERT INTO user (lastname, firstname, email, password, birthday, admin)
           VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bindValue(1,$this->lastname);
            $stmt->bindValue(2,$this->firstname);
            $stmt->bindValue(3,$this->email);
            $stmt->bindValue(4,$this->password);
            $stmt->bindValue(5,$this->birthday);
            $stmt->bindValue(6,$this->admin);

            $stmt->execute();


        }catch(PDOException $erreur){
            echo $erreur->getMessage();
        }
    }

    public static function checkEmail($email){

        try{    

        $dao = new DAO();
        $dbh = $dao->getDbh();

        $stmt = $dbh->prepare("SELECT email FROM user WHERE email=?");
        $stmt->bindParam(1,$email);
        $stmt->execute();

        return $stmt->fetchAll();

    }catch(PDOException $erreur){
        echo $erreur->getMessage();
    }

    }
}


?>