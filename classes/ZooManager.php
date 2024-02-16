<?php

class ZooManager {

    private PDO $connexion;


    public function __construct(PDO $connexion)
    {
        $this->connexion = $connexion;        
    }


    public function addZoo(Zoo $zoo){
        $preparedRequest = $this->connexion->prepare(
            "INSERT INTO zoo (name, nbr_max_enclos) VALUE (?,?)"
        );
        $preparedRequest->execute([
            $zoo->getName(),
            $zoo->getNbrMaxEnclos()
        ]);
    }


    public function getAll(){
        $preparedRequest = $this->connexion->prepare(
            "SELECT * FROM zoo"
        );
        $preparedRequest->execute();

        $zoosArray = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
        // echo '<pre>';
        // var_dump($zoosArray);
        // echo '</pre>';
        $zoosArrayObject = [];
        foreach ($zoosArray as $line) {
            $zoo = new Zoo($line);
            $zoosArrayObject[]= $zoo;
        }
        return $zoosArrayObject;
    }

    public function getById($id){
        $preparedRequest = $this->connexion->prepare(
            "SELECT * FROM zoo WHERE id = ?"
        );
        $preparedRequest->execute([$id]);

        $line = $preparedRequest->fetch(PDO::FETCH_ASSOC);
        $zoo = new Zoo($line);
        return $zoo;
    }
}