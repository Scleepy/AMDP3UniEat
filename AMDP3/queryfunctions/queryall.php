<?php
    session_start();
    $shopName = $_SESSION['name'];
    include "../connection.php";

    $query = "SELECT * FROM shop";
    $res = $connection->query($query);

        while($row = $res->fetch_assoc()){
            $shopID = $row['shopID'];
            $imgUrl = $row['imgUrl'];
            $query = "SELECT * FROM shop WHERE shopID = '$shopID'";
            $result = $connection->query($query);
            $row = $result->fetch_assoc();
                
            $shopTitle = $row['shopTitle'];
            $imgUrl = $row['imgUrl'];

            $query = "SELECT COUNT(DISTINCT orderTimeStamp) AS totalReviewCount FROM reviews JOIN orders ON reviews.orderID = orders.orderID WHERE orders.shopID = $shopID";
            $result = $connection->query($query);
            $row = $result->fetch_assoc();

            $totalReviews = $row['totalReviewCount'];

            $query = "SELECT categoryName FROM shop JOIN shopcategories ON shop.shopID = shopcategories.shopID JOIN categories ON shopcategories.categoryID = categories.categoryID WHERE shop.shopID=$shopID";
            $result = $connection->query($query);

            $shopCategories = '';

            while($row = $result->fetch_assoc()){
                $shopCategories = $shopCategories . $row['categoryName'] . ', ';
            }

            echo 
            "<a href='./shoppage.php?shopID=$shopID'>
                <div class='shop-card'>
                    <img src='$imgUrl'>
                    <div class='shop-info'>
                        <h4>{$shopTitle}</h4>
                        <p>{$totalReviews} Reviews</p>
                        <p>{$shopCategories}</p>
                    </div>
                </div>
            </a>";
        }
?>