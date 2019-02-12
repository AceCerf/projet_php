<?php
function __autoload($class) {
  require_once('obj/'.$class.'.php');
}