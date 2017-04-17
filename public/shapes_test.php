<?php 

require __DIR__ . '/Rectangle.php';
require __DIR__ . '/Square.php';


$test = new Rectangle(3,5);
echo "The area is: " . $test->area() .PHP_EOL;

$test2 = new Square(4);
echo "The perimeter is: " . $test2->perimeter() . PHP_EOL;

$test3 = new Square(5);
echo $test3->area() . PHP_EOL;

$test4 = new Rectangle(4);
echo $test4->area() . PHP_EOL;



 ?>