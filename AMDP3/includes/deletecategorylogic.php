<?php
    include "./connection.php";

    $categoryID = $_GET['categoryID'];

    $query = "SELECT * FROM categories WHERE categoryID = $categoryID";
    $result = $connection->query($query);
    $row = $result->fetch_assoc();

    $categoryName = $row['categoryName'];

    if(isset($_POST['delete'])){

        $query = "DELETE FROM categories WHERE categoryID = $categoryID";
        $connection->query($query);
        
        header('Location: ./managecategories.php');
    }

    if(isset($_POST['cancel'])){
        header('Location: ./managecategories.php');
    }

?>