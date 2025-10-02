<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'zomato';

$con = mysqli_connect($host, $user, $pass, $db_name);

if (!$con) {
    echo 'Database not connected';
    die();
}