<?php 

    $search = $_POST['searchfield'];

    if(!isset($_SESSION['role']) || $_SESSION['role'] == 'customer'){
        $query = "SELECT * FROM shop WHERE shopTitle LIKE '%$search%'";
        $result = $connection->query($query);

        while($row = $result->fetch_assoc()){
            $shopID = $row['shopID'];
            $shopTitle = $row['shopTitle'];
            $imgUrl = $row['imgUrl'];

            $query = "SELECT categoryName FROM shop JOIN shopcategories ON shop.shopID = shopcategories.shopID JOIN categories ON shopcategories.categoryID = categories.categoryID WHERE shop.shopID='$shopID'";
            $result = $connection->query($query);

            $shopCategories = '';

            while($row = $result->fetch_assoc()){
                $shopCategories = $shopCategories . $row['categoryName'] . ', ';
            }

            $query = "SELECT COUNT(DISTINCT orderTimeStamp) AS totalReviewCount FROM reviews JOIN orders ON reviews.orderID = orders.orderID WHERE orders.shopID = $shopID";
            $result = $connection->query($query);
            $row = $result->fetch_assoc();

            $totalReviews = $row['totalReviewCount'];

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
    } else if($_SESSION['role'] == 'tenant') {

        include "./connection.php";

        $shopTitle = $_SESSION['name'];

        $query = "SELECT *, SUM(totalPrice) AS orderSum, DATE_FORMAT(orderTimeStamp, '%e %M %Y %H.%i') AS formattedTime, COUNT(*) AS itemCount FROM orders JOIN shop ON orders.shopID = shop.shopID JOIN users ON users.userID = orders.userID WHERE shopTitle='$shopTitle' AND status = 'uncompleted' AND name LIKE '%$search%' GROUP BY orderTimeStamp ASC";

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
            "<a href='./processorder.php?shopID=$shopID&orderTime=$orderTime&userID=$userID'>
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

    } else {

        $query = "SELECT * FROM shop WHERE shopTitle LIKE '%$search%'";
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


    }

?>