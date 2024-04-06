<?php

$host = 'localhost';
$dbname = 'dbticketbooker';
$dbusername = 'root';
$dbpassword = '';

$connection = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($connection->connect_error) {
    die('Connection failed' . $connection->connect_error);
}
echo 'Connected succesfully';
