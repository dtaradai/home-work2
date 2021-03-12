<?php
namespace Figure;

use Exception;

class Rectangle extends Figure {
  public $width;
  public $height;

  public function __construct($width, $height) {

    try{

      if (!is_int($width) || !is_int($height)) {
        
        throw new Exception('Ошибка при введении данных при создании экземпляра класса Rectangle.');
      }
      
      $this->width = $width;
      $this->height = $height;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
    
  }

  public function perimeter() {
    return (($this->width + $this->height) * 2) ;
  }
  public function square() {
    return ($this->width * $this->height);
  }
}