<?php
    include "./connection.php";

    $shopTitle = $_SESSION['name'];

    $query = "SELECT *, SUM(totalPrice) AS orderSum, DATE_FORMAT(orderTimeStamp, '%e %M %Y %H.%i') AS formattedTime, COUNT(*) AS itemCount FROM orders JOIN shop ON orders.shopID = shop.shopID JOIN users ON users.userID = orders.userID WHERE shopTitle='$shopTitle' AND status = 'completed' GROUP BY orderTimeStamp DESC;";
    $result = $connection->query($query);

    while($row = $result->fetch_assoc()){
        $userID = $row['userID'];
        $userName = $row['name'];
        $itemCount = $row['itemCount'];
        $formattedTime = $row['formattedTime'];
        $orderSum = $row['orderSum'];
        $shopID = $row['shopID'];
        $orderTime = $row['orderTimeStamp'];

        echo 
        "<a href='./previousorderdetail.php?shopID=$shopID&orderTime=$orderTime&userID=$userID'>
            <div class='shop-card'>
                <img src='./img/user.png'>
                <div class='shop-info'>
                    <h4>$userName</h4>
                    <p>$itemCount item(s)</p>
                    <p>Total: Rp.$orderSum</p>
                    <p>$formattedTime</p>
                </div>
            </div>
        </a>";

    }

?>