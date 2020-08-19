<?php
// Database configuration
/*$dbHost     = "localhost";
$dbUsername = "linkio";
$dbPassword = "";
$dbName     = "my_linkio";*/
$dbHost     = "89.46.111.80";
$dbUsername = "Sql1294295";
$dbPassword = "8644278e02";
$dbName     = "Sql1294295_3";
try
{
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
?>