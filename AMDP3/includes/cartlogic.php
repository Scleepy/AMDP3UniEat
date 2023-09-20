<?php
    $userID = $_SESSION['userID'];

    $query = "SELECT * FROM cart JOIN shop ON cart.shopID = shop.shopID JOIN users ON users.userID = cart.userID JOIN item ON item.itemID = cart.itemID WHERE cart.userID = $userID";
    $result = $connection->query($query);
    $row = $result->fetch_assoc();

    if($result->num_rows == 0){
        echo "<h1>Cart is empty :(</h1>";
    } else {

        $shopID = $row["shopID"];
        $shopName = $row["shopTitle"];
        $userName = $row["name"];
        $phoneNumber = $row["phoneNumber"];

        $totalPriceGlobal = 0;

        $itemID = $row['itemID'];
        $itemName = $row['itemName'];
        $itemAmount = $row['itemAmount'];
        $itemNotes = $row['itemNotes'];
        $totalPrice = $row['itemPrice'] * $itemAmount;

        $totalPriceGlobal += $totalPrice;

        echo "
        <div class='cart-container'>
            <p><b>Shop: $shopName</b></p>
            <p><b>Delivered to: $userName ($phoneNumber)</b></p>
            <form action='' method='POST'>
                    <div>
                        <label for=''><b>Place*: </b></label>
                        <input class='form-control' name='address' type='text' placeholder='Add the place you want to be delivered to'>
                    </div>
                    <p>Order Summary <a href='./shoppage.php?shopID=$shopID'>Add Items</a></p>
                <div>
                    <p>$itemName x$itemAmount: $totalPrice</p>
                    <p>Note: $itemNotes</p>
                    <a href='./itemdetail.php?shopID=$shopID&itemID=$itemID' >Edit</a>
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
                        <a href='./itemdetail.php?shopID=$shopID&itemID=$itemID' >Edit</a>
                    </div>
                ";
            }
                    
                    echo "
                    <p><b>Total: $totalPriceGlobal</b></p>
                <button class='btn btn-primary' name='order'>Order</button>
            </form>
        </div>";
    }

    if(isset($_POST['order'])){

        $userAddress = trim($_POST['address']);

        if($userAddress == ''){
            echo "<script>alert('Enter your address')</script>";
        } else {
            $query = "SELECT * FROM cart JOIN shop ON cart.shopID = shop.shopID JOIN users ON users.userID = cart.userID JOIN item ON item.itemID = cart.itemID WHERE cart.userID = $userID";

            $result = $connection->query($query);

            while($row = $result->fetch_assoc()){
                $itemID = $row['itemID'];
                $itemName = $row['itemName'];
                $itemAmount = $row['itemAmount'];
                $itemNotes = $row['itemNotes'];
                $totalPrice = $row['itemPrice'] * $itemAmount;
                
                $query = "INSERT INTO orders(shopID, itemID, userID, itemAmount, itemNotes, userAddress, totalPrice) VALUES($shopID, $itemID, $userID, $itemAmount, '$itemNotes', '$userAddress', $totalPrice)";
                $connection->query($query);

                $query = "DELETE FROM cart WHERE userID = $userID AND itemID = $itemID";
                $connection->query($query);
            }
        }

        
        
    }


?>