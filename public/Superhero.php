<?php 
require __DIR__ . "/person.php";

class SuperHero extends Person 
{
	public $alterEgo;

	public function alterEgo()
	{
		return $this->alterEgo;
	}
}

$person = new Person('Dewayne', 'Allen');
echo $person->fullName(), PHP_EOL;


 ?>