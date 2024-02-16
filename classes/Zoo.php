<?php

class Zoo {
    private int $id;
    private string $name;
    private int $nbr_max_enclos = 6;
    private array $enclos = [];

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
    public function getNbrMaxEnclos(){
        return $this->nbr_max_enclos;
    }
    public function setNbrMaxEnclos($nbr_max_enclos){
        $this->nbr_max_enclos = $nbr_max_enclos;
    }
    public function getEnclos(){
        return $this->enclos;
    }
    public function setEnclos($enclos){
        $this->enclos = $enclos;
    }
    public function addEnclos($enclos){
        // $this->enclos[] = $enclos;
        array_push($this->enclos, $enclos);
    }
}
