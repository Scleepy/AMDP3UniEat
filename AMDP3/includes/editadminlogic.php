<?php
    include "./connection.php";

    $userID = $_GET['userID'];
    $query = "SELECT * FROM users WHERE userID = $userID";
    $result = $connection->query($query);
    $row = $result->fetch_assoc();

    $adminName = $row['name'];
    $adminEmail = $row['email'];
    $adminPhoneNumber = $row['phoneNumber'];

    if(isset($_POST['save'])){

        $newAdminName = $_POST['adminname'];
        $newAdminEmail = $_POST['adminemail'];
        $newAdminPhoneNumber = $_POST['adminphonenumber'];
        $newGender = $_POST['gender'];

        $nameValid = true;
        $emailValid = true;
        $phoneNumberValid = true;

        if(strlen($newAdminName) < 5 || !ctype_alpha(str_replace(' ', '',$newAdminName))){
            $nameValid = false;
        }

        if($newAdminEmail == '' || !filter_var($newAdminEmail, FILTER_VALIDATE_EMAIL)){
            $emailValid = false;
        }

        if(substr($newAdminPhoneNumber, 0, 1) == '+'){
            if(!is_numeric(substr($newAdminPhoneNumber, 1, strlen($newAdminPhoneNumber) - 1)) || (strlen($newAdminPhoneNumber) - 1) < 10){
                $phoneNumberValid = false;
            }
        } else {

            if(!is_numeric(substr($newAdminPhoneNumber, 1, strlen($newAdminPhoneNumber) - 1)) || (strlen($newAdminPhoneNumber) - 1) < 10){
                $phoneNumberValid = false;
            }
        }

        if (!$nameValid || !$emailValid || !$phoneNumberValid){
            echo "<script>alert('Update failed, please check your data')</script>";
        } else {

            $query = "UPDATE users SET name = '$newAdminName', email = '$newAdminEmail', phoneNumber = '$newAdminPhoneNumber', gender = '$newGender' WHERE userID = $userID";
            $connection->query($query);

            header('Location: ./manageadmin.php');

        }
    }

    if(isset($_POST['cancel'])){
        header('Location: ./manageadmin.php');
    }

    if(isset($_POST['delete'])){
        $query = "DELETE FROM users WHERE userID = $userID";
        $connection->query($query);

        header('Location: ./manageadmin.php');
    }



?>