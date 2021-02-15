<?php
namespace HW\Figure;

use HW\Logger\Logger;

require_once('Logger/Logger.php');
require_once('Figure/Figure.php');
require_once('Figure/Rectangle.php');
require_once('Figure/Triangle.php');
require_once('Figure/Circle.php');

$rectangle = new Rectangle(5, 8 );
$triangle = new Triangle(5, 6, 7);
$circle = new Circle(5);

$level = 'ERROR';
$message = ' /\/\/5 ';

$logger = new Logger($level, $message);

echo '<pre>';
print_r($logger);
echo '</pre>';

echo date('Y-m-d H:m:s');