<?php

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "contact_app";

$conn = mysqli_connect($host,$dbUsername,$dbPassword,$dbName);

if(!$conn){
    die("Database Connect Fail".mysqli_connect_error());
}