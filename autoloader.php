<?php
//se lance à chaque instanciation d'un objet
spl_autoload_register(function ($class) {
    
  
    //j'enléve APP
   $class_path = str_replace('App\\', '', $class);

    
    //chemin jusqu'au dossier racine plus chemin jusqu'au fichier plus nom de l'extension
    $class_path =  __DIR__ .'/'. $class_path . '.php';

    
    //remplace anti slash par slash \ => /
    $class_path = str_replace('\\', '/', $class_path);

    
    
     // si le fichier est trouvé alors je le require
    if (file_exists($class_path)) {
        require_once $class_path;
    }
});

?>