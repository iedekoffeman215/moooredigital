<?php

//Vul hier de juiste database gegevens in

$DatabaseHost = "localhost";
$DatabaseUser = "root";
$DatabasePassword = "";
$DatabaseName = "moooredigital";

$connection = new mysqli($DatabaseHost, $DatabaseUser, $DatabasePassword, $DatabaseName);

     if (!$connection) {
         die("Database connection failed");
 }
?>