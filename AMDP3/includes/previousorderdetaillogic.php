<?php
    
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
            <p><b>Shop: $shopName: </b><a class='blue-redirect' id='anchor-rate' >Rate and Review</a></p>
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
            </form>
        </div>";
            
        echo "<dialog id='popup'>
        <form action='./previousorderdetail.php?shopID=$shopID&orderTime=$orderTime' method='POST' >
            <h2>Rate and Review</h2>
                <p>Stars</p>
                <div class='amount-container review-container'>
                    <button class='btn btn-primary' id='button-minus-rate' type='button'>-</button>
                    <input id='input-amount' class='form-control' name='stars' type='text' value='5' readonly>
                    <button class='btn btn-primary' id='button-add-rate' type='button'>+</button>
                </div>

                <div>
                    <label for=''>Notes</label>
                    <input class='form-control' name='review-text' type='text' placeholder='Enter your review'>
                </div>

                <div>
                    <button class='btn btn-primary' name='submit'>Submit</button>
                    <button class='btn btn-primary' type='button' id='toggle-close'>Cancel</button>
                </div>
            </form>
        </dialog>";

        echo "
        <script>
            const popup = document.querySelector('#popup');
            const toggleButton = document.querySelector('#anchor-rate');

            toggleButton.addEventListener('click', () => {
                popup.showModal();
            });
            
            const closeButton = document.querySelector('#toggle-close');
            closeButton.addEventListener('click', () => {
                popup.close();
            });
                
        </script>";

        echo "<script src='./js/rateitem.js'></script>";

        if(isset($_POST['submit'])){
            $reviewText = $_POST['review-text'];
            $stars = $_POST['stars'];

            $query = "SELECT *, DATE_FORMAT(orderTimeStamp, '%e %M %Y %H.%i') AS formatedTime FROM orders JOIN shop ON orders.shopID = shop.shopID JOIN users ON orders.userID = users.userID JOIN item ON orders.itemID = item.itemID WHERE orders.userID = $userID AND orderTimeStamp = '$orderTime'";
            
            $result = $connection->query($query);

            while($row = $result->fetch_assoc()){
                $orderID = $row['orderID'];
                $query = "INSERT INTO reviews(userID, orderID, reviewText, stars) VALUES($userID, $orderID, '$reviewText', $stars)";
                $connection->query($query);
            }

            echo "<script>alert('Item rated')</script>";
        }

?>