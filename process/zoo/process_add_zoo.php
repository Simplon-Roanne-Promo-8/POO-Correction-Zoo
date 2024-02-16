<?php
require '../../config/autoload.php';
require '../../config/db.php';

if (!empty($_POST["name"])) {

    $zoo = new Zoo($_POST);
    var_dump($zoo);

    $zooManager = new ZooManager($db);
    $zooManager->addZoo($zoo);
    header('Location: ../../index.php?success=Le zoo a été créé !');
}
