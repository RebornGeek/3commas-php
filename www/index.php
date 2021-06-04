<?php
/*
 * Example usage of ThreeCommasApi class
 */

require_once('ThreeCommasApi.php');
$threeCommasApi = new ThreeCommasApi(); // Initialize the class
var_dump($threeCommasApi->requestJson()); // Request json