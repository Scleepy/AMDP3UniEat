<?php
    include "./connection.php";

    $shopID = $_GET["shopID"];

    $query = "SELECT * FROM item JOIN shop ON item.shopID = shop.shopID WHERE shop.shopID = $shopID";
    $res = $connection->query($query);

        while($row = $res->fetch_assoc()){
            $shopTitle = $row["shopTitle"];
            $itemID = $row["itemID"];
            $itemTitle = $row['itemName'];
            $itemDescription = $row['itemDesc'];
            $itemPrice = $row['itemPrice'];
            $itemImgUrl = $row['itemImgUrl'];

            echo 
            "<a href='./itemdetail.php?shopID=$shopID&itemID=$itemID'>
                <div class='shop-item-container' >
                    <img src='$itemImgUrl'>
                    <div class='shop-info'>
                        <h4>{$itemTitle}</h4>
                        <p>{$itemDescription}</p>
                        <p>{$itemPrice}</p>
                    </div>
                </div>
            </a>";
        }
?>