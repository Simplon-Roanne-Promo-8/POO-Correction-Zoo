<?php


try {
    $db = new PDO('mysql:host=localhost;dbname=poo_zoo_p8', 'root', '');
} catch (\Throwable $th) {
    echo $th->getMessage();
}