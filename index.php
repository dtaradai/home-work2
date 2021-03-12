<?php

use Logger\Logger;

require_once 'functions.php';
spl_autoload_register('project_autoload');

$level = 'ERROR';
$message = 'hkgcjghjklk';

$file = Logger::getInstance($message, $level);


//-----------Исключения-----------------

function decimToBinary($decimal)
{
  if ($decimal == 0) {
    return '0';
  } elseif (is_int($decimal) && ($decimal > 0)) {
    $binar = '';
    $revers = '';

    while ($decimal >= 1) {
      $binar .= $decimal % 2;
      $decimal /= 2;
    }

    for ($i = strlen($binar); $i >= 0; $i--) {
      $revers .= substr($binar, $i, 1);
    }
    return $revers;
  } else {
    return 'Введите пожалуйста положительное число';
  }
}


try {
    if ($decimal == 0) {
        throw new Exception('Вы ввели 0');
    } 
    echo decimToBinary($decimal);
} catch (Exception $e) {
    echo $e->getMessage();
}
