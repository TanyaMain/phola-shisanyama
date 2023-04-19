<?php
    require 'database/database.php';
    $database= new database();
    $database->CreateTables();
    header('location: home.php')
?>