<?php
namespace Figure;
use Exception;

class Triangle extends Figure {
  public $sideA;
  public $sideB;
  public $sideC;

  public function __construct($sideA, $sideB, $sideC) {

    try{
      if (!is_int($sideA) || !is_int($sideB) || !is_int($sideC) ) {
        throw new Exception('Ошибка при введении данных при создании экземпляра класса Triangle.');
      }
      $this->sideA = $sideA;
      $this->sideB = $sideB;
      $this->sideC = $sideC;
    } catch (Exception $e) {
      echo $e->getMessage();
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