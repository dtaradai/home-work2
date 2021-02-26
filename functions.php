<?php

// функция автозагрузки классов
function project_autoload($class) {
  $prefix = '';

  $baseDir = __DIR__ . '/classes/';
  $lengPrefix = strlen($prefix);

  //проверяем, существует ли данный клас, в соответствии с префиксом
  if(strncmp($prefix, $class, $lengPrefix) !== 0) {
    return;
  }

  $relativeClass = substr($class, $lengPrefix);
  $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

  if (file_exists($file)) {
    require $file;
  }
}