<?php

namespace TestTask\Sequence;


class DataMaster implements DataReceiver
{
  public $numericCollection = [];
  
  protected $argumentsCount;
  protected $argumentsArray = [];
  
  public function __construct($n, array $arr)
  {
    $this->argumentsCount = $n;
    $this->argumentsArray = $arr;
  }
  
  /**
   * @return bool
   */
  public function distinguishCollectionFromData()
  {
    if ($this->argumentsCount <= 1) {
      return false;
    }
    else {
      return $this->getArrayFromData();
    }
  }
  
  /**
   * @return bool
   */
  private function getArrayFromData() {
    for ($i=1; $i<$this->argumentsCount; $i++) {
      $this->numericCollection[] = array_merge(['Sequence № '.$i], $this->convertToNumeric(explode(',', $this->argumentsArray[$i])));
    }
    return true;
  }
  
  /**
   * @param array $arr
   * @return array
   */
  private function convertToNumeric(array $arr) {
    return array_map(function($item) {
      return is_numeric($item) ? (int)$item : false;
    }, $arr);
  }
  
}