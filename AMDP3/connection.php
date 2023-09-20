<?php
    $connection = new mysqli('localhost', 'root', '', 'amdp3');

    if($connection->connect_errno){
        die("Failed to connect to database");
    }
?>