<?php
    
    $servename = "localhost";
    $username = "root";
    $password = "";

    $conn = new PDO("mysql:host=$servename;dbname=restaurante_bd", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>