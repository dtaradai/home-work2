<?php

namespace HW\Logger;

class Logger
{
  private $date;
  private $level;
  private $message;

  public function __construct($level, $message)
  {
    $this->date = date('Y-m-d H:m:s');
    $this->levelVerification($level);
    $this->messageVerification($message);
    $this->writingToFile($this->date, $this->level, $this->message);
  }

  public function levelVerification($level)
  {
    if ($level === 'TRACE' || $level === 'DEBUG' || $level === 'INFO' || $level === 'WARN' || $level === 'ERROR' || $level === 'FATAL') {
      $this->level = $level;
    } else {
      exit('Error level');
    }
  }

  public function messageVerification($message)
  {
    if (!empty($message)) {
      $this->message = htmlspecialchars(stripslashes(trim($message)));
    } else {
      exit('Error message');
    }
  }

  public function writingToFile($date, $level, $message)
  {
    $fd = fopen("loger.txt", 'a') or die("не удалось открыть файл");
    $str = '(' . $date . ': ' . $message . ', ' . $level . ');'; // строка для записи
    fwrite($fd, $str);            // запишем строку в начало
    // fseek($fd, 0);             // поместим указатель файла в начало
    // fwrite($fd, "Хрю");        // запишем в начало строку
    // fseek($fd, 0, SEEK_END);   // поместим указатель в конец
    // fwrite($fd, $str);         // запишем в конце еще одну строку
    fclose($fd);                  // Закрываем файл
  }
}
