<?php
    $hostname = 'localhost';
    $username = 'root';
    $psw = 'niki#';
    $database = 'crm';
    session_start();
    $conn=mysqli_connect($hostname,$username,$psw,$database);
?>