<?php

namespace TestTask\Sequence;


interface SequenceChecker
{
  function isArithmeticProgression(array $sequence);
  
  function isGeometricProgression(array $sequence);
}
