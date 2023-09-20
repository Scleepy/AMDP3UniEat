<?php
    include "./connection.php";

    if(isset($_POST['save'])){

        $categoryName = trim($_POST['categoryname']);

        if(strlen($categoryName) == 0){
            echo "<script>alert('Save failed, please check your data')</script>";
        } else {
            $query = "INSERT INTO categories(categoryName) VALUES('$categoryName')";
            $connection->query($query);
            
            header('Location: ./managecategories.php');
        }
    }

    if(isset($_POST['cancel'])){
        header('Location: ./managecategories.php');
    }


?>