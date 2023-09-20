<?php
    include "./connection.php";

    $shopTitle = $_SESSION['name'];

    $query = "SELECT * FROM item JOIN shop ON item.shopID = shop.shopID WHERE shopTitle = '$shopTitle'";
    $res = $connection->query($query);

        while($row = $res->fetch_assoc()){
            $shopId = $row['shopID'];
            $shopTitle = $row["shopTitle"];
            $itemID = $row["itemID"];
            $itemTitle = $row['itemName'];
            $itemDescription = $row['itemDesc'];
            $itemPrice = $row['itemPrice'];
            $itemImgUrl = $row['itemImgUrl'];

            echo 
            "<div class='shop-item-container' >
                <img src='$itemImgUrl'>
                <div class='shop-info'>
                    <h4>{$itemTitle}: 
                    <a href='./edititem.php?itemID=$itemID'>Edit</a>
                    <a href='./deleteitem.php?itemID=$itemID'>Delete</a></h4>
                    <p>{$itemDescription}</p>
                    <p>{$itemPrice}</p>
                </div>
            </div>";
        }
?>