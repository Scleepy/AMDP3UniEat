<?php
    include "./connection.php";


    if(isset($_POST['save'])){

        $adminName = $_POST['adminname'];
        $adminEmail = $_POST['adminemail'];
        $adminPhoneNumber = $_POST['adminphonenumber'];
        $gender = $_POST['gender'];

        $nameValid = true;
        $emailValid = true;
        $phoneNumberValid = true;

        if(strlen($adminName) < 5 || !ctype_alpha(str_replace(' ', '',$adminName))){
            $nameValid = false;
        }

        if($adminEmail == '' || !filter_var($adminEmail, FILTER_VALIDATE_EMAIL)){
            $emailValid = false;
        }

        if(substr($adminPhoneNumber, 0, 1) == '+'){
            if(!is_numeric(substr($adminPhoneNumber, 1, strlen($adminPhoneNumber) - 1)) || (strlen($adminPhoneNumber) - 1) < 10){
                $phoneNumberValid = false;
            }
        } else {

            if(!is_numeric(substr($adminPhoneNumber, 1, strlen($adminPhoneNumber) - 1)) || (strlen($adminPhoneNumber) - 1) < 10){
                $phoneNumberValid = false;
            }
        }

        if (!$nameValid || !$emailValid || !$phoneNumberValid){
            echo "<script>alert('Save failed, please check your data')</script>";
        } else {
   
            $alphabet = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
            $numbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
            $adminPassword = '';

            for($i = 0; $i < 5; $i++) $adminPassword = $adminPassword . $alphabet[rand(0, sizeof($alphabet) - 1)];
            for($i = 5; $i < 8; $i++) $adminPassword = $adminPassword . $numbers[rand(0, sizeof($numbers) - 1)];

            $query = "INSERT INTO users(name, email, phoneNumber, userPassword, userRole, gender) VALUES ('$adminName', '$adminEmail', '$adminPhoneNumber', '$adminPassword', 'admin', '$gender')";

            $result = $connection->query($query);

            if($result = true){
                mail('$adminEmail', 'Admin User Created', 'You can login with your password: '.$adminPassword);

                header('Location: ./manageadmin.php');
            }

        }
    }

    if(isset($_POST['cancel'])){
        header('Location: ./manageadmin.php');
    }

?>