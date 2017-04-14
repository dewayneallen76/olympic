<?php 
class Person 
{
	public $name;
	public $languages;

	public function __construct($name, array $languages)
	{
		$this->name = $name;
		$this->languages = $languages;
		
	}
}

$person = new Person('Dewayne',['HTHL', 'PHP', 'MySQL']); // Enforce rules when you construct an object

echo $person->name, PHP_EOL;
print_r($person->languages) . PHP_EOL;


 ?>