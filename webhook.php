<?php
require_once 'vendor/autoload.php';

$filename = 'responses/response.json';


$data = file_get_contents('php://input') . PHP_EOL;
file_put_contents($filename, print_r($data, true), FILE_APPEND);

?>


