<?php
namespace Figure;
use Exception;

class Circle extends Figure {

  public $radius;

  public function __construct($radius) {

    try{
      if (!is_int($radius) ) {
        throw new Exception('Ошибка при введении данных при создании экземпляра класса Circle.');
      }
      $this->radius = $radius;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function perimeter() {
    return ($this->radius * 2 * M_PI) ;
  }
  public function square() {
    return ($this->radius ** 2 * M_PI);
  }
}