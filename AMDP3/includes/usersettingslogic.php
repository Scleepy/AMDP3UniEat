<?php
    $fEmail = $_SESSION['email'];

    $query = "SELECT * FROM users WHERE email like '$fEmail';";
    $result = $connection->query($query);

    $row = $result->fetch_assoc();

    $name = $row['name'];
    $phoneNumber = $row['phoneNumber'];
    $email = $row['email'];

    $usernameValid = true;
    $phoneNumberValid = true;

    if(isset($_POST['update'])){

        $newName = trim($_POST['username']);
        $newPhoneNumber = trim($_POST['phonenumber']);
        

        if(strlen($newName) < 5 || !ctype_alpha($newName)){
            $usernameValid = false;
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

        if (!$usernameValid || !$phoneNumberValid){
            echo "<script>alert('Update failed, please check your data')</script>";
        } else {

            $_SESSION['name'] = $newName;

            $query = "UPDATE users SET name = '$newName', phoneNumber = '$newPhoneNumber' WHERE email = '$email';";
            $result = $connection->query($query);

            if($result = true){
                header('Location: usersettings.php');
            }
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

            $query = "UPDATE users SET userPassword = '$newPassword' WHERE email = '$email';";
            $result = $connection->query($query);

            if($result = true){
                header('Location: usersettings.php');
            }
        }
    }
?>