<?php 
include('delivyController.php');
include('delivyModel.php');
session_start();
define('INCLUDE_PATH','http://localhost/Delivery/');

$delivyController = new Controllers\delivyController();
$delivyController->index();