<?php
    include "./connection.php";
    $query = "SELECT * FROM categories";
    $result = $connection->query($query);

    while($row = $result->fetch_assoc()){
        $categoryName = trim($row['categoryName']);

        $categoryName2 = strtolower($categoryName);

        echo "
        <input type='radio' class='btn-check' name='option-main' id='option-$categoryName2'>
        <label class='btn btn-outline-primary' for='option-$categoryName2'>$categoryName</label>
        ";
    }


?>