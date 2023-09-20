<?php
    include "./connection.php";

    $userID = $_SESSION['userID'];

    $query = "SELECT *, SUM(totalPrice) AS orderSum, DATE_FORMAT(orderTimeStamp, '%e %M %Y %H.%i') AS formattedTime FROM orders JOIN shop ON orders.shopID = shop.shopID WHERE userID = $userID AND status = 'completed' GROUP BY orderTimeStamp DESC;";
    $result = $connection->query($query);

    while($row = $result->fetch_assoc()){
        $shopID = $row['shopID'];
        $imgUrl = $row['imgUrl'];
        $shopName = $row['shopTitle'];
        $orderTime = $row['orderTimeStamp'];
        $formattedTime = $row['formattedTime'];
        $orderSum = $row['orderSum'];

        echo 
        "<a href='./previousorderdetail.php?shopID=$shopID&orderTime=$orderTime'>
            <div class='shop-card'>
                <img src='$imgUrl'>
                <div class='shop-info'>
                    <h4>$shopName</h4>
                    <p>$formattedTime</p>
                    <p>Rp.$orderSum</p>
                </div>
            </div>
        </a>";

    }

?>