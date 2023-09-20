<?php
    include "./connection.php";
    $itemID = $_GET['itemID'];

    $query = "SELECT * FROM item WHERE itemID = $itemID";
    $result = $connection->query($query);

    $row = $result->fetch_assoc();

    $itemName = $row['itemName'];
    $itemPrice = $row['itemPrice'];
    $itemDesc = $row['itemDesc'];

    if(isset($_POST['delete'])){
        $query = "DELETE FROM item WHERE itemID = $itemID";
        $connection->query($query);
        header('Location: ./manageitems.php');
    }

    if(isset($_POST['cancel'])){
        header('Location: ./manageitems.php');
    }



?>