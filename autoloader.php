<?php

namespace TestTask;

/**
 * @param $className
 */
function LoadMyClass($className) {
  $classSubDirs = explode('\\', $className);
  
  if ($classSubDirs[0] === 'TestTask') {
    $pathToClass = '';
    foreach ($classSubDirs as $key => $subDir) {
      if ($key === 0) {
        continue;
      }
      $pathToClass .= '/'.$subDir;
    }
    if ($pathToClass !== '') {
      /** @noinspection PhpIncludeInspection */
      require_once __DIR__.$pathToClass.'.php';
    }
  }
}

spl_autoload_register('TestTask\\LoadMyClass');
