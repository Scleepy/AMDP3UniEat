<?php
    include "./connection.php";

    $query = "SELECT * FROM users WHERE userRole = 'admin'";
    $result = $connection->query($query);

    while($row = $result->fetch_assoc()){
        
        $userID = $row['userID'];
        $adminName = $row['name'];

        echo 
        "<a href='./editadmin.php?userID=$userID'>
            <div class='admin-content'>
                <img src='./img/user.png'>
                <b>$adminName</b>
            </div>
        </a>";
    }

?>