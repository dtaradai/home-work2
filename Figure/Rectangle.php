<?php
namespace HW\Figure;

class Rectangle extends Figure {
  public $width;
  public $height;

  public function __construct($width, $height) {
    if (is_int($width) && is_int($height)) {
      $this->width = $width;
      $this->height = $height;
    } else {
      exit ('Error $width or $height');
    }
    
  }

  public function perimeter() {
    return (($this->width + $this->height) * 2) ;
  }
  public function square() {
    return ($this->width * $this->height);
  }
}