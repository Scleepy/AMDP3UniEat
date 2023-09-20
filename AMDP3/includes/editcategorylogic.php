<?php
    include "./connection.php";

    $categoryID = $_GET['categoryID'];

    $query = "SELECT * FROM categories WHERE categoryID = $categoryID";
    $result = $connection->query($query);
    $row = $result->fetch_assoc();

    $categoryName = $row['categoryName'];

    if(isset($_POST['save'])){

        $newCategoryName = trim($_POST['categoryname']);

        if(strlen($newCategoryName) == 0){
            echo "<script>alert('Save failed, please check your data')</script>";
        } else {

            $query = "UPDATE categories SET categoryName = '$newCategoryName' WHERE categoryID = $categoryID";
            $connection->query($query);

            header('Location: ./managecategories.php');
        }
    }

    if(isset($_POST['cancel'])){
        header('Location: ./managecategories.php');
    }

?>