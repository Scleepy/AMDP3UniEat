<?php
    include "./connection.php";

    $shopName = $_SESSION['name'];
    $categoryArray = array();

    $query = "SELECT shopTitle, categoryName FROM shopcategories JOIN categories ON shopcategories.categoryID = categories.categoryID JOIN shop ON shop.shopID = shopcategories.shopID WHERE shopTitle = '$shopName'";
    $result = $connection->query($query);
    
    while($row = $result->fetch_assoc()){ 

        $categoryName = trim($row['categoryName']);

        array_push($categoryArray, $categoryName);
    }

    $query = "SELECT * FROM categories";
    $result = $connection->query($query);

    echo "<br>";
    while($row = $result->fetch_assoc()){ 
        $categoryName = trim($row['categoryName']);

        if(in_array($categoryName, $categoryArray, TRUE)){
            echo 
            "<input type='checkbox' name='category[]' value='$categoryName' checked>
            <label for='$categoryName'>$categoryName</label><br>";
        } else {
            echo 
            "<input type='checkbox' name='category[]' value='$categoryName'>
            <label for='$categoryName'>$categoryName</label><br>";
        }
    }

    if(isset($_POST['save'])){
        $currentPassword = trim($_POST['currentpassword']);
        $newPassword = trim($_POST['newpassword']);
        $confirmNewPassword = trim($_POST['confirmpassword']);

        $currentPasswordValid = true;
        $newPasswordValid = true; 
        $confirmNewPasswordValid = true;

        $password = $_SESSION['password'];
        
        if($currentPassword == '' || $password != $currentPassword){
            $currentPasswordValid = false;
        }

        if($newPassword == '' || $newPassword == $currentPassword){
            $newPasswordValid = false; 
        }

        if($confirmNewPassword == '' || $confirmNewPassword != $newPassword){
            $confirmNewPasswordValid = false;
        } 

        if(!$currentPasswordValid || !$newPasswordValid || !$confirmNewPasswordValid){
            echo "<script>alert('Update failed, please check your data: $password, $currentPassword, $newPassword, $confirmNewPassword')</script>";
        } else {
            $_SESSION['password'] = $newPassword;
            $email = $_SESSION['email'];

            $query = "UPDATE users SET userPassword = '$newPassword' WHERE email = '$email';";
            $result = $connection->query($query);

            if($result = true){
                header('Location: tenantsettings.php');
            }
        }
    }

    
?>