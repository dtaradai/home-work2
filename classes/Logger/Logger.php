<?php
namespace Logger;

use \Exception;

class Logger {
  private static $filePath;
  private static $date;
  private static $level;
  private static $message;
  private static $_logger = null;

  // Делаем невозможным создание объекта класса на прямую
  private function __construct() {}

  // Метод для создания объекта класса
  public static function getInstance($message, $level = 'DEFAUULT') : Logger {
    self::messageVerification($message);
    self::levelVerification($level);
    self::writingToFile(self::$date, self::$level, self::$message);

    if (self::$_logger === null) {
      self::$_logger = new Logger($message, $level);
    }

    return self::$_logger;
  }


  private static function levelVerification($level)
  {

    try {
      if ($level !== 'TRACE' && $level !== 'DEBUG' && $level !== 'INFO' && $level !== 'WARN' && $level !== 'ERROR' && $level !== 'FATAL' && $level !== 'DEFAULT') {
          throw new Exception('Error level');
      } 
      self::$level = $level;
      self::$date = date('Y-m-d H:m:s');
    } catch (Exception $e) {
        echo $e->getMessage();
    }
  }

  private static function messageVerification($message)
  {
    try {
      if (empty($message)) {
        throw new Exception('Error message!');
      }
      self::$message = htmlspecialchars(stripslashes(trim($message)));
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  private static function writingToFile($date, $level, $message)
  {
    $fileDescriptor = fopen(self::$filePath == null ? self::$filePath = 'logger.log' : self::$filePath, 'a');
    $str = '(' . $date . ': ' . $message . ', ' . $level . ');'; // строка для записи
    fwrite($fileDescriptor, $str);            // запишем строку в начало
    fclose($fileDescriptor);                  // Закрываем файл
  }

  //oбъявляем для того, что бы невозможно было создать еще 1 объект этого же класса
  private function __clone() {}
  private function __wakeup() {}
  private function __sleep() {}
}