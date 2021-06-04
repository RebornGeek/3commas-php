<?php
/*
 * Example usage of ThreeCommasApi class
 */

error_reporting(E_ALL);
require_once('ThreeCommasApi.php');
$threeCommasApi = new ThreeCommasApi(); // Initialize the class
var_dump($threeCommasApi->requestJson()); // Request json