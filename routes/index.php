<?php
$routes = new \Bramus\Router\Router();
//define routes 
require_once __DIR__ . '/admin.php';
require_once __DIR__ . '/client.php';

$routes->run();
?>