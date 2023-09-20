<?php
    include "./connection.php";
    $shopName = $_SESSION["name"];

    $query = "SELECT * FROM shop WHERE shopTitle = '$shopName'";
    $result = $connection->query($query);
    $row = $result->fetch_assoc();
    $imgUrl = $row['imgUrl'];

    echo "<img src='$imgUrl' class='img-tenant-settings'>";

?>