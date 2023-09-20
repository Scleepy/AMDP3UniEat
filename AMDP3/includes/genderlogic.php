<?php 

    $userID = $_GET['userID'];

    $query = "SELECT * FROM users WHERE userID = $userID";
    $result = $connection->query($query);
    $row = $result->fetch_assoc();

    $gender = trim($row['gender']);

    if($gender == 'Male'){
        echo "
        <input type='radio' name='gender' value='Male' checked>
        <label>Male</label>
        <input type='radio' name='gender' value='Female'>
        <label>Female</label>"; 
    } else {
        echo "
        <input type='radio' name='gender' value='Male'>
        <label>Male</label>
        <input type='radio' name='gender' value='Female' checked>
        <label>Female</label>"; 
    }


?>