<?php 

require __DIR__ . '/Rectangle.php';
require __DIR__ . '/Square.php';


$test = new Rectangle(5,5);
echo "The area is: " . $test->area() .PHP_EOL;

$test2 = new Square(9);
echo "The perimeter is: " . $test2->perimeter() . PHP_EOL;


 ?>