<?php

    if(!isset($_SESSION["role"]) || $_SESSION["role"] != 'tenant'){
        $shopID = $_GET["shopID"];
    } else {
        $shopTitle = $_SESSION['name'];

        $query = "SELECT * FROM shop WHERE shopTitle = '$shopTitle'";
        $result = $connection->query($query);
        $row = $result->fetch_assoc();

        $shopID = $row["shopID"];
    }


    include "./connection.php";

    $query = "SELECT * FROM shop WHERE shopID = $shopID";
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
        "<div class='shop-header'>
            <img src='$imgUrl'>
            <div class='shop-info'>
                <h4>$shopTitle</h4>
                <p>$totalReviews Reviews</p>
                <p>$shopCategories</p>
            </div>
        </div>";
        
    echo "<script src='./js/redirectshop.js'></script>";
?>