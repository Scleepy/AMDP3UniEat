<?php
    include "./connection.php";
    $query = "SELECT * FROM categories";
    $result = $connection->query($query);

    while($row = $result->fetch_assoc()){
        $categoryID = $row['categoryID'];
        $categoryName = $row['categoryName'];

        echo "
        <div class='category-container'>
            <p>$categoryName</p>
            <a href='./editcategory.php?categoryID=$categoryID'>Edit</a>
            <a href='./deletecategory.php?categoryID=$categoryID'>Delete</a>
        </div>";
    }

?>