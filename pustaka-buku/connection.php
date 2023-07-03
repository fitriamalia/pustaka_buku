<?php
// connection.php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

function getConnection(): PDO
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pustaka_buku";
    
    return new PDO("mysql:host=$servername;dbname=$database", $username, $password, [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
}

?>