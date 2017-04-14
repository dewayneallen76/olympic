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

    public function alterEgo()
    {
        return 'Top Secret Alternate Ego: ' . $this->fullName();
    }

    public function hasCape()
    {
        return !empty($this->capeColor);
    }
}

$superman = new Superhero('Clark', 'Kent');
$superman->pseudonym = 'Superman';
$superman->capeColor = 'red';

echo $superman->alterEgo(), PHP_EOL;
var_dump($superman->hasCape());


 ?>