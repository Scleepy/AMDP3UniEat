<?php

    include "./connection.php";
    $shopName = $_SESSION['name'];

    if(isset($_POST['update'])){

        $success = false;
        $file = $_FILES["file"];
        $fileName = $file["name"]; 
        $tempFile = $file["tmp_name"]; 
        $fileSize = $file["size"];

        if($fileName != '' && $fileSize < 2000000){
            $extensionList = array('.jpg', '.jpeg', '.png', '.gif', '.svg');

            $extension = substr($fileName, strpos($fileName, '.'), strlen($fileName));
            
            if(in_array($extension, $extensionList, TRUE)){

                $location = './img/shop/'.$shopName.$extension;

                move_uploaded_file($tempFile, $location); 

                $query = "UPDATE shop SET imgUrl = '$location' WHERE shopTitle = '$shopName'";
                $connection->query($query);


            } else {
                echo "<script>alert('Unsupported datatype')</script>";
            }
        }

        if(empty($_POST['category'])){
            echo "<script>alert('Please select at least 1 category')</script>";
        } else {
            $categoriesList = $_POST['category'];

            $query = "DELETE shopcategories FROM shopcategories JOIN shop ON shopcategories.shopID = shop.shopID JOIN categories ON categories.categoryID = shopcategories.categoryID WHERE shopTitle = '$shopName'";

            $connection->query($query);

            $query = "SELECT * FROM shop WHERE shopTitle = '$shopName'";
            $result = $connection->query($query);
            $row = $result->fetch_assoc();

            $shopID = $row['shopID'];
                
            foreach($categoriesList as $category){

                $query = "SELECT * FROM categories WHERE categoryName='$category'";
                $result = $connection->query($query);
                $row = $result->fetch_assoc();

                $categoryID = $row['categoryID'];

                $query = "INSERT INTO shopcategories(categoryID, shopID) VALUES($categoryID, $shopID)";
                $connection->query($query);
            }
            
            $success = true;
        }

        if($success == true) header('Location: ./showcurrentorders.php');

    }
?>