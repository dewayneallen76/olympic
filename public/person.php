<?php 
class Person 
{

	public $firstName;
	public $lastName;
	public $languages;

	public $alterEgo;

	public function __construct($firstName, $lastName)
	{
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		
		
	}

	public function fullName()
	{
		return $this->firstName . ' ' . $this->lastName; 
	}
}

$person = new Person("Dewayne", "Allen"); // Enforce rules when you construct an object

echo $person->fullName(), PHP_EOL;


 ?>