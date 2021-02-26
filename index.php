<?php
use Logger\Logger;

require_once 'functions.php';
spl_autoload_register('project_autoload');

$level = 'ERROR';
$message = ' /\/\/5 ';

$file = Logger::getInstance($message, $level);
echo '<pre>';
var_dump($file);
echo '</pre>';

use Figure\Rectangle;

$rectangle = new Rectangle(5, 8 );
// $triangle = new Triangle(5, 6, 7);
// $circle = new Circle(5);

echo $rectangle->square();

