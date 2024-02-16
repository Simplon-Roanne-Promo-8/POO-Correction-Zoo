<?php

class EnclosManager {

    private PDO $connexion;


    public function __construct(PDO $connexion)
    {
        $this->connexion = $connexion;        
    }


    public function addEnclos(Enclos $enclos){
        $preparedRequest = $this->connexion->prepare(
            "INSERT INTO enclos (name, zoo_id, cleanness, type, nbr_max_animals) VALUE (?,?,?,?,?)"
        );
        $preparedRequest->execute([
            $enclos->getName(),
            $enclos->getZooId(),
            $enclos->getCleanness(),
            $enclos->getType(),
            $enclos->getNbrMaxAnimals()
        ]);
    }

    public function findByZooID(Zoo $zoo){
        
        $preparedRequest = $this->connexion->prepare(
            "SELECT * FROM enclos WHERE zoo_id = ?"
        );
        $preparedRequest->execute([$zoo->getId()]);

        $enclosArray = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);

        foreach ($enclosArray as $line) {
            $enclos = new Enclos($line);
            $zoo->addEnclos($enclos);
        }
    }
}