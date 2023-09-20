<?php
    
    include "./connection.php";
    
    $orderTime = $_GET['orderTime'];

    if($_SESSION["role"] == "tenant"){
        $userID = $_GET['userID'];
    } else {
        $userID = $_SESSION['userID'];
    }

    $query = "SELECT *, DATE_FORMAT(orderTimeStamp, '%e %M %Y %H.%i') AS formatedTime FROM orders JOIN shop ON orders.shopID = shop.shopID JOIN users ON orders.userID = users.userID JOIN item ON orders.itemID = item.itemID WHERE orders.userID = $userID AND orderTimeStamp = '$orderTime'";
    $result = $connection->query($query);
    $row = $result->fetch_assoc();

        $orderID = $row['orderID'];
        $shopID = $row["shopID"];
        $shopName = $row["shopTitle"];
        $userName = $row["name"];
        $phoneNumber = $row["phoneNumber"];
        $formatedTime = $row["formatedTime"];

        $totalPriceGlobal = 0;

        $itemID = $row['itemID'];
        $itemName = $row['itemName'];
        $itemAmount = $row['itemAmount'];
        $itemNotes = $row['itemNotes'];
        $totalPrice = $row['itemPrice'] * $itemAmount;
        $userAddress = $row['userAddress'];

        $totalPriceGlobal += $totalPrice;

        echo "
        <div class='cart-container'>
            <p><b>Shop: $shopName</b></p>
            <p><b>Delivered to: $userName ($phoneNumber)</b></p>
            <form action='' method='POST'>
                    <div>
                        <label for=''><b>Place*: </b></label>
                        <input class='form-control' name='address' type='text' placeholder='$userAddress' disabled>
                    </div>
                    <p>Order Summary: $formatedTime</p>
                <div>
                    <p>$itemName x$itemAmount: $totalPrice</p>
                    <p>Note: $itemNotes</p>
                </div>";

            while($row = $result->fetch_assoc()){

                $itemID = $row['itemID'];
                $itemName = $row['itemName'];
                $itemAmount = $row['itemAmount'];
                $itemNotes = $row['itemNotes'];
                $totalPrice = $row['itemPrice'] * $itemAmount;

                $totalPriceGlobal += $totalPrice;

                echo "
                    <div>
                        <p>$itemName x$itemAmount: $totalPrice</p>
                        <p>Note: $itemNotes</p>
                    </div>
                ";
            }
                    
                    echo "
                    <p><b>Total: $totalPriceGlobal</b></p>
                    <button class='btn btn-primary' name='complete' >Done</button>
            </form>
        </div>";
            
    if(isset($_POST['complete'])){
        $query = "UPDATE orders SET status = 'completed' WHERE userID = $userID AND orderTimeStamp = '$orderTime'";
        $connection->query($query);

        header('Location: showcurrentorders.php');
    }

        

?>