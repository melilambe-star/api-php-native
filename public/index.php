<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

require_once __DIR__ . '/../src/Router.php';

use Src\Router;


$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$uri = str_replace(['/www/api-php-nativee/public', '/api-php-nativee/public', '/public'], '', $uri);
$uri = strtok($uri, '?'); 


$uri = '/' . trim($uri, '/');


Router::route($method, $uri);
