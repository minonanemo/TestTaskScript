<?php

namespace TestTask;

use TestTask\Sequence\DataMaster;
use TestTask\Sequence\MathChecker;

require 'autoloader.php';

$master = new DataMaster($argc, $argv);

if (!$master->distinguishCollectionFromData()) {
  echo "No data entered. Start again.\nYou may enter several sequences.\nSequences to be separated by space,\nand elements of sequence to be separated by comma.\n";
  die();
}

$investigator = new MathChecker();

foreach ($master->numericCollection as $singleSequence) {
  $arithmetic = $investigator->isArithmeticProgression($singleSequence);
  $geometric = $investigator->isGeometricProgression($singleSequence);
  if (!$arithmetic && !$geometric) {
    echo $singleSequence[0]." is neither arithmetic nor geometric progression.";
  }
  echo $arithmetic;
  echo $geometric;
  echo "\n";
}
