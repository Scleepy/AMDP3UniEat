<?php
    include "./connection.php";
    $query = "SELECT * FROM shop";
    $result = $connection->query($query);

    while ($row = $result->fetch_assoc()){
        $shopTitle = $row['shopTitle'];
        $imgUrl = $row['imgUrl'];

        echo 
        "<a href='./edittenant.php?shopTitle=$shopTitle'>
            <div class='shop-card'>
                <img src='$imgUrl'>
                <div class='shop-info'>
                    <h4>{$shopTitle}</h4>
                </div>
            </div>
        </a>";
    }




?>