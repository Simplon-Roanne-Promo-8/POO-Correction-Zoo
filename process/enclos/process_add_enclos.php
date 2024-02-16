<?php
require '../../config/autoload.php';
require '../../config/db.php';

if (!empty($_POST["name"]) && !empty($_POST["type"]) && !empty($_POST["zoo_id"])) {

    
    $enclos = new Enclos($_POST);
    

    $enclosManager = new EnclosManager($db);
    $enclosManager->addEnclos($enclos);

    header("Location: ../../zoo.php?zoo_id=" .$_POST["zoo_id"]. "&success=L'enclos a été créé !" );
}
