<?php

    if(!isset($_SESSION["userID"])){
        header("Location: ./login.php");
    }

    $itemID = $_GET["itemID"];
    $userID = $_SESSION["userID"];
    $shopID = $_GET["shopID"];

    $query = "SELECT * FROM item WHERE itemID = '$itemID'";
    $result = $connection->query($query);
    $row = $result->fetch_assoc();

    $itemImgUrl = $row['itemImgUrl'];
    $itemTitle = $row["itemName"];
    $itemDescription = $row["itemDesc"];
    $itemPrice = $row["itemPrice"];

    echo "<dialog id='filled-popup'>
    <form action='./itemdetail.php?shopID=$shopID&itemID=$itemID' method='POST' >
        <h2>Cart is Filled</h2>
        <p>Cart has been filled with another shop's items, you need to remove all items in the cart first to add this shop's items</p>
        <b>Do you want to remove it?</b>
            <div class='setting-button-group'>
                <button class='btn btn-primary' name='yes-remove'>Yes</button>
                <button class='btn btn-primary' type='button' id='toggle-close-filled' name='no-remove'>No</button>
            </div>
        </form>
    </dialog>";

    if(isset($_POST["submit"])){

        $query = "SELECT * FROM cart JOIN shop ON cart.shopID = shop.shopID WHERE userID = $userID";
        $result = $connection->query($query);
        $row = $result->fetch_assoc();

        if($result->num_rows != 0 && $row['shopID'] != $shopID){

            $_SESSION['tempitemamount'] = $_POST["amount"];

            echo "
            <script>
                const dialogBoxFilled = document.querySelector('#filled-popup');
                dialogBoxFilled.showModal();
                
                const closeButton = document.querySelector('#toggle-close-filled');

                closeButton.addEventListener('click', () => {
                dialogBoxFilled.close();
                window.location.href='./shoppage.php?shopID=$shopID';
                });
                
            </script>";
        } else {
            $itemAmount = $_POST["amount"];
            $itemNotes = $_POST["notes"];

            $query = "INSERT INTO cart(itemAmount, itemID, itemNotes, shopID, userID) VALUES('$itemAmount', '$itemID', '$itemNotes', '$shopID', '$userID');";
            
            $result = $connection->query($query);

            header("Location: ./shoppage.php?shopID=$shopID");

        }
    }

    $query = "SELECT * FROM cart JOIN item ON cart.itemID = item.itemID WHERE userID = $userID AND item.itemID = $itemID;";
    $result = $connection->query($query);
    $cartItemAmount = '';
    $cartItemName = '';

    if($result->num_rows != 0){
        $row = $result->fetch_assoc();
        $cartItemAmount = $row["itemAmount"];
        $cartItemName = $row["itemName"];
    }

    if(isset($_POST["add-item"])){
        $newItemAmount =  $cartItemAmount + 1;

        $query = "UPDATE cart SET itemAmount = $newItemAmount WHERE userID = $userID AND itemID = $itemID;";

        $result = $connection->query($query);

        header("Location: ./shoppage.php?shopID=$shopID");
    }

    echo "<dialog id='popup'>
    <form action='./itemdetail.php?shopID=$shopID&itemID=$itemID' method='POST' >
        <h2>$cartItemName x$cartItemAmount</h2>
        <p>Items already in the cart, want to add another?</p>
            <div class='setting-button-group'>
                <button class='btn btn-primary' name='add-item'>Yes</button>
                <button class='btn btn-primary' type='button' id='toggle-close' name='cancel'>No</button>
            </div>
        </form>
    </dialog>";

    $query = "SELECT * FROM cart JOIN item ON cart.itemID = item.itemID WHERE userID = $userID AND item.itemID = $itemID;";

    $result = $connection->query($query);
    $row = $result->fetch_assoc();

    if($result->num_rows != 0){
        echo "
        <script>
            const dialogBox = document.querySelector('#popup');
            dialogBox.showModal();

            const closeButton = document.querySelector('#toggle-close');

            closeButton.addEventListener('click', () => {
                dialogBox.close();
                window.location.href='./shoppage.php?shopID=$shopID';
            });
        </script>";
    }

    if(isset($_POST["yes-remove"])){
        $query = "DELETE FROM cart WHERE userID = $userID";
        $result = $connection->query($query);


        $itemAmount = $_SESSION['tempitemamount'];
        $itemNotes = $_POST["notes"];

        $query = "INSERT INTO cart(itemAmount, itemID, itemNotes, shopID, userID) VALUES('$itemAmount', '$itemID', '$itemNotes', '$shopID', '$userID');";
            
        $result = $connection->query($query);

        header("Location: ./shoppage.php?shopID=$shopID");

    }


?>