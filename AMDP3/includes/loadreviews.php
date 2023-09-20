<?php
    include "./connection.php";

    $shopID = $_GET['shopID'];

    $query = "SELECT *, GROUP_CONCAT(CONCAT(itemName, ' x', itemAmount)) AS fullOrder, DATE_FORMAT(orderTimeStamp, '%e %M %Y %H.%i') AS formattedTime FROM reviews JOIN orders ON reviews.orderID = orders.orderID JOIN users ON reviews.userID = users.userID JOIN item ON orders.itemID = item.itemID WHERE item.shopID = $shopID GROUP BY orderTimeStamp";
    $result = $connection->query($query);

    while($row = $result->fetch_assoc()){

        $userName = $row['name'];
        $stars = $row['stars'];
        $review = $row['reviewText'];
        $fullOrder = $row['fullOrder'];
        $formattedTime = $row['formattedTime'];

        echo 
            "<div class='shop-item-container' >
                    <div class='shop-info'>
                        <p><b>$userName</b> : $formattedTime</p>
                        <p><b>Rating</b> : $stars</p>
                        <p><b>Review</b> : $review</p>
                        <p><b>Ordered</b> : $fullOrder</p>
                    </div>
                </div>";

    }

?>