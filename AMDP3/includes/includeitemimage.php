<?php
    include "./connection.php";
    $itemID = $_GET['itemID'];

    $query = "SELECT * FROM item WHERE itemID = $itemID";
    $result = $connection->query($query);
    $row = $result->fetch_assoc();
    $imgUrl = $row['itemImgUrl'];

    echo "<img src='$imgUrl' class='img-tenant-settings'>";

?>