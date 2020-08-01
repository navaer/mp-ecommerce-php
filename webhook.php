<?php
require_once 'vendor/autoload.php';

$filename = $_GET['id'] . '.json';


$data = file_get_contents('php://input');
file_put_contents($filename, print_r($data, true));


?>


