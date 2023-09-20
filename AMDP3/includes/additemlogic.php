<?php

    include "./connection.php";

    $shopName = $_SESSION['name'];

    $query = "SELECT * FROM shop WHERE shopTitle = '$shopName'";
    $result = $connection->query($query);
    $row = $result->fetch_assoc();

    $shopID = $row['shopID'];

    if(isset($_POST['add'])){

        $itemName = $_POST['itemname'];
        $itemPrice = $_POST['itemprice'];
        $itemDesc = $_POST['itemdescription'];

        $nameValid = true;
        $priceValid = true;

        if(strlen($itemName) < 5 || !ctype_alpha(str_replace(' ', '',$itemName))){
            $nameValid = false;
        }

        if($itemPrice < 1000){
            $priceValid = false;
        }

        if (!$nameValid || !$priceValid){
            echo "<script>alert('Failed to add, please check your data')</script>";
        } else {

            $file = $_FILES["file"];
            $fileName = $file["name"]; 
            $tempFile = $file["tmp_name"]; 
            $fileSize = $file["size"];

            if($fileName != '' && $fileSize < 2000000){
                $extensionList = array('.jpg', '.jpeg', '.png', '.gif', '.svg');

                $extension = substr($fileName, strpos($fileName, '.'), strlen($fileName));
                
                if(in_array($extension, $extensionList, TRUE)){

                    $location = './img/food/'.$shopName.'_'.$itemName.$extension;

                    move_uploaded_file($tempFile, $location); 

                    $query = "INSERT INTO item(shopID, itemName, itemDesc, itemPrice, itemImgUrl) VALUES($shopID, '$itemName', '$itemDesc', $itemPrice, '$location')";
                    $connection->query($query);

                    header('Location: ./manageitems.php');

                } else {
                    echo "<script>alert('Unsupported datatype')</script>";
                }
            } else {
                echo "<script>alert('2MB size limit exceeded')</script>";
            }
        }
    }


?>