<?php 
require __DIR__ . "/person.php";

// Best Practices: 
// 1. Each class shoudl have its own file where the filename is the same as the class name
// 2. Automobile.php, Car.php, Truck.php
// 3. Classes/Objects are a way of organizing functionality. 

class Superhero extends Person
{
    public $pseudonym;
    public $capeColor;

    public function __construct($firstName, $lastName, $pseudonym)
    {
        parent::__construct($firstName, $lastName);
        $this->pseudonym = $pseudonym;
    }

    public function fullName()
    {
        return $this->pseudonym;
    }

    public function alterEgo()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function hasCape()
    {
        return !empty($this->capeColor);
    }
}

$superman = new Superhero('Clark', 'Kent', 'Superman');
echo $superman->fullName() , PHP_EOL;
echo $superman->alterEgo() , PHP_EOL;


 ?>