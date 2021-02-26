<?php
namespace Figure;

class Triangle extends Figure {
  public $sideA;
  public $sideB;
  public $sideC;

  public function __construct($sideA, $sideB, $sideC) {
    if (is_int($sideA) && is_int($sideB) && is_int($sideC)) {
      $this->sideA = $sideA;
      $this->sideB = $sideB;
      $this->sideC = $sideC;
    } else {
      exit ('Error $side');
    }
    
  }

  public function perimeter() {
    return ($this->sideA + $this->sideB +$this->sideC) ;
  }
  public function square() {
    $semiPerim = $this->perimeter() / 2;
    return sqrt($semiPerim  * ($semiPerim - $this->sideA) 
                            * ($semiPerim - $this->sideB)
                            * ($semiPerim - $this->sideC)
                );
  }
}