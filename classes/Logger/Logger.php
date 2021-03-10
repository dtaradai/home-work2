<?php
namespace Logger;

use \Exception;

class Logger {
  private $filePath;
  private $date;
  private $level;
  private $message;
  private static $_logger = null;

  // Делаем невозможным создание объекта класса на прямую
  // Здесь создаем объект текущего класса
  private function __construct($message, $level = 'DEFAULT') {
    // $this->filePath = 'logger.txt';
    $this->messageVerification($message);
    $this->levelVerification($level);
    $this->writingToFile($this->date, $this->level, $this->message);
  }

  // Метод для создания объекта класса
  public static function getInstance($message, $level) : Logger {

    // instanceof()
    if (self::$_logger === null) {
      //Здесь срабатывает конструктор, при необходимости передаем в него необходимые параметры
      // записываем наш объект в переменную
      self::$_logger = new Logger($message, $level);
    }

    return self::$_logger;
  }


  private function levelVerification($level)
  {

    try {
      if ($level !== 'TRACE' && $level !== 'DEBUG' && $level !== 'INFO' && $level !== 'WARN' && $level !== 'ERROR' && $level !== 'FATAL' && $level !== 'DEFAULT') {
          throw new Exception('Error level');
      } 
      $this->level = $level;
      $this->date = date('Y-m-d H:m:s');
  } catch (Exception $e) {
      echo $e->getMessage();
  }

    // if ($level === 'TRACE' || $level === 'DEBUG' || $level === 'INFO' || $level === 'WARN' || $level === 'ERROR' || $level === 'FATAL' || $level === 'DEFAULT') {
    //   $this->level = $level;
    //   $this->date = date('Y-m-d H:m:s');
    // } else {
    //   exit('Error level');
    // }
  }

  private function messageVerification($message)
  {
    try {
      if (empty($message)) {
        throw new Exception('Error message!');
      }
      $this->message = htmlspecialchars(stripslashes(trim($message)));
    } catch (Exception $e) {
      echo $e->getMessage();
    }

    // if (!empty($message)) {
    //   $this->message = htmlspecialchars(stripslashes(trim($message)));
    // } else {
    //   exit('Error message');
    // }
  }

  private function writingToFile($date, $level, $message)
  {
    $fd = fopen($this->filePath == null ? $this->filePath = 'logger.txt' : $this->filePath, 'a');
    // $fd = fopen($this->filePath, 'a') or die("не удалось открыть файл");
    $str = '(' . $date . ': ' . $message . ', ' . $level . ');'; // строка для записи
    fwrite($fd, $str);            // запишем строку в начало
    fclose($fd);                  // Закрываем файл
  }

  //oбъявляем для того, что бы невозможно было создать еще 1 объект этого же класса
  private function __clone() {}
  private function __wakeup() {}
  private function __sleep() {}
}