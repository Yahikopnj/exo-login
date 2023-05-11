<?php

/**le namespace sert a regrouper plusieurs fichiers et le APP\model sert a faire le chemin depuis le fichier racine jusqu'au model */
namespace App\Model;

/**le \PDO sert a dire d'utiliser le PDO de ce fichier */
use \PDO;


/**c'est la création de la class DAO */
class DAO{


/**les attribue qui servent a se connectere a la bdd */
    private $host="localhost";
    private $dbname="cinema";
    private $port="3306";
    private $dbh;

    function __construct()
    {  $dsn= "mysql:host=".$this->host.";dbname=".$this->dbname.";port=".$this->port.";charset=UTF8";
        $this->dbh= new PDO($dsn, "root", "");
       
        
    }

    public function getDbh(){
        return $this->dbh;
    }
}

?>