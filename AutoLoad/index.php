<?php
function __autoload($class_name) {
  //echo "I am autoload method.";
  require_once $class_name . '.php';
  //throw new Exception("Unable to load $class_name");
}

try {
  $p = new Person();
} catch (Exception $e) {
  echo $e->getMessage();
}