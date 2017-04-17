<?php 

require __DIR__ . '/Rectangle.php';
require __DIR__ . '/Square.php';




$test = new Rectangle(3,5);
echo "The area is: " . $test->area() . PHP_EOL;
echo "The perimeter is: " . $test->perimeter() . PHP_EOL;


$test2 = new Square(4);
echo "The perimeter is: " . $test2->perimeter() . PHP_EOL;
echo "The area is: " . $test2->area() . PHP_EOL;





 ?>