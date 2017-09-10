<?php

namespace TestTask\Sequence;


class MathChecker implements SequenceChecker
{
  private $itemsNumber;
  
  private function isImproperForProgression(array $sequence) {
    $this->itemsNumber = count($sequence);
    if ($this->itemsNumber < 3) { return true; }
    if (in_array(false, $sequence, true)) { return true; }
    if (($sequence[1] === 0) && ($sequence[2] === 0)) { return true; }
    return false;
  }
  
  /**
   * @param array $sequence
   * @return bool|string
   */
  public function isArithmeticProgression(array $sequence)
  {
    if ($this->isImproperForProgression($sequence )) { return false; }
    
    $delta = $sequence[2] - $sequence[1];
    for ($i=3; $i<$this->itemsNumber; $i++) {
      if (($sequence[$i] - $sequence[$i-1]) !== $delta) {
        return false;
      }
    }
    
    return $sequence[0]." is definitely arithmetic progression\n";
  }
  
  /**
   * @param array $sequence
   * @return bool|string
   */
  public function isGeometricProgression(array $sequence)
  {
    if ($this->isImproperForProgression($sequence )) { return false; }
  
    if ($sequence[1] === 0) {
      return false;
    }
    $divider =  $sequence[2] / $sequence[1];
    for ($i=3; $i<$this->itemsNumber; $i++) {
      if (($sequence[$i-1] === 0) || (($sequence[$i] / $sequence[$i-1]) !== $divider)) {
        return false;
      }
    }
  
    return $sequence[0]." is definitely geometric progression\n";
  }
}