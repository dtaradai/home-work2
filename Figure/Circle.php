<?php
namespace HW\Figure;

class Circle extends Figure {
  public $radius;

  public function __construct($radius) {
    if (is_int($radius) || $radius > 0) {
      $this->radius = $radius;
    } else {
      exit ('Error $radius');
    } 
  }

  public function perimeter() {
    return ($this->radius * 2 * M_PI) ;
  }
  public function square() {
    return ($this->radius ** 2 * M_PI);
  }
}