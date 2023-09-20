<?php 
    include "./connection.php";
    $itemID = $_GET['itemID'];
    $shopName = $_SESSION['name'];

    $query = "SELECT * FROM item WHERE itemID = $itemID";
    $result = $connection->query($query);

    $row = $result->fetch_assoc();

    $itemName = $row['itemName'];
    $itemPrice = $row['itemPrice'];
    $itemDesc = $row['itemDesc'];

    if(isset($_POST['update'])){

        $newName = $_POST['itemname'];
        $newPrice = $_POST['itemprice'];
        $newDesc = $_POST['itemdescription'];

        $nameValid = true;
        $priceValid = true;

        if(strlen($newName) < 5 || !ctype_alpha(str_replace(' ', '',$newName))){
            $nameValid = false;
        }

        if($newPrice < 1000){
            $priceValid = false;
        }

        if (!$nameValid || !$priceValid){
            echo "<script>alert('Failed to update, please check your data')</script>";
        } else {

            $file = $_FILES["file"];
            $fileName = $file["name"]; 
            $tempFile = $file["tmp_name"]; 

            if($fileName != ''){
                $extensionList = array('.jpg', '.jpeg', '.png', '.gif', '.svg');

                $extension = substr($fileName, strpos($fileName, '.'), strlen($fileName));
                
                if(in_array($extension, $extensionList, TRUE)){

                    $location = './img/food/'.$shopName.'_'.$newName.$extension;

                    move_uploaded_file($tempFile, $location); 

                    $query = "UPDATE item SET itemImgUrl = '$location' WHERE itemID = '$itemID'";
                    $connection->query($query);

                } else {
                    echo "<script>alert('Unsupported datatype')</script>";
                }
            }

        }

        $query = "UPDATE item SET itemName = '$newName', itemPrice = $newPrice, itemDesc = '$newDesc' WHERE itemID = $itemID"; 
        $connection->query($query);

        header('Location: ./manageitems.php');
    }

?>