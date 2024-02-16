<?php 

class Enclos {

    private int $id;
    private string $name;
    private int $cleanness = 100;
    private int $nbr_max_animals = 6;
    private array $animals = [];
    private string $type;
    private int $zoo_id;
    
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }    

    public function hydrate(array $data){
        foreach ($data as $key => $value) {
            $method = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    public function getCleanness(){
        return $this->cleanness;
    }
    public function setCleanness($cleanness){
        $this->cleanness = $cleanness;
    }
    public function getNbrMaxAnimals(){
        return $this->nbr_max_animals;
    }
    public function setNbrMaxAnimals($nbr_max_animals){
        $this->nbr_max_animals = $nbr_max_animals;
    }
    public function getZooId(){
        return $this->zoo_id;
    }
    public function setZooId($zoo_id){
        $this->zoo_id = $zoo_id;
    }

    public function getAnimals(){
        return $this->animals;
    }
    public function setAnimals($animals){
        $this->animals = $animals;
    }
    public function addAnimal($animal){
        // $this->animals[] = $animals;
        array_push($this->animals, $animal);
    }

    public function getType(){
        return $this->type;
    }
    public function setType($type){
        $this->type = $type;
    }

}