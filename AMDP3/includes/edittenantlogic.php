<?php

    $shopTitle = $_GET['shopTitle'];

    $query = "SELECT * FROM users JOIN shop ON users.name = shop.shopTitle WHERE name='$shopTitle'";
    $result = $connection->query($query);
    $row = $result->fetch_assoc();

    $tenantImgUrl = $row['imgUrl'];
    $tenantEmail = $row['email'];
    $tenantPhoneNumber = $row['phoneNumber'];

    if(isset($_POST['save'])){

        $newName = trim($_POST['tenantname']);
        $newEmail = trim($_POST['tenantemail']);
        $newPhoneNumber = ($_POST['tenantphonenumber']);

        $nameValid = true;
        $emailValid = true;
        $phoneNumberValid = true;

        if(strlen($newName) < 5 || !ctype_alpha(str_replace(' ', '', $newName))){
            $nameValid = false;
        }

        if($newEmail == '' || !filter_var($newEmail, FILTER_VALIDATE_EMAIL)){
            $emailValid = false;
        }

        if(substr($newPhoneNumber, 0, 1) == '+'){
            if(!is_numeric(substr($newPhoneNumber, 1, strlen($newPhoneNumber) - 1)) || (strlen($newPhoneNumber) - 1) < 10){
                $phoneNumberValid = false;
            }
        } else {

            if(!is_numeric(substr($newPhoneNumber, 1, strlen($newPhoneNumber) - 1)) || (strlen($newPhoneNumber) - 1) < 10){
                $phoneNumberValid = false;
            }
        }

        if (!$nameValid || !$emailValid || !$phoneNumberValid){
            echo "<script>alert('Update failed, please check your data')</script>";
        } else {
            $query = "UPDATE users SET name = '$newName', email = '$newEmail', phoneNumber = '$newPhoneNumber' WHERE name = '$shopTitle'";

            $connection->query($query);

            $query = "UPDATE shop SET shopTitle = '$newName' WHERE shopTitle = '$shopTitle'";
            $connection->query($query);

            header('Location: ./managetenant.php');
        }
    }

    if(isset($_POST['cancel'])){
        header('Location: ./managetenant.php');
    }

    if(isset($_POST['delete'])){

        $query = "DELETE FROM shop WHERE shopTitle = '$shopTitle'";
        $connection->query($query);

        $query = "DELETE FROM users WHERE name = '$shopTitle'";
        $connection->query($query);

        header('Location: ./managetenant.php');
    }


    


?>