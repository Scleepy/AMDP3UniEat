<?php
    if(isset($_POST['save'])){
        $tenantName = $_POST['tenantname'];
        $tenantEmail = $_POST['tenantemail'];
        $tenantPhoneNumber = $_POST['tenantphonenumber'];

        $nameValid = true;
        $emailValid = true;
        $phoneNumberValid = true;

        if(strlen($tenantName) < 5 || !ctype_alpha(str_replace(' ', '', $tenantName))){
            $nameValid = false;
        }

        if($tenantEmail == '' || !filter_var($tenantEmail, FILTER_VALIDATE_EMAIL)){
            $emailValid = false;
        }

        if(substr($tenantPhoneNumber, 0, 1) == '+'){
            if(!is_numeric(substr($tenantPhoneNumber, 1, strlen($tenantPhoneNumber) - 1)) || (strlen($tenantPhoneNumber) - 1) < 10){
                $phoneNumberValid = false;
            }
        } else {

            if(!is_numeric(substr($tenantPhoneNumber, 1, strlen($tenantPhoneNumber) - 1)) || (strlen($tenantPhoneNumber) - 1) < 10){
                $phoneNumberValid = false;
            }
        }

        if (!$nameValid || !$emailValid || !$phoneNumberValid){
            echo "<script>alert('Adding tenant failed, please check your data')</script>";
        } else {

            $alphabet = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
            $numbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
            $password = '';

            for($i = 0; $i < 5; $i++) $password = $password . $alphabet[rand(0, sizeof($alphabet) - 1)];
            for($i = 5; $i < 8; $i++) $password = $password . $numbers[rand(0, sizeof($numbers) - 1)];
                
            $file = $_FILES["file"];
            $fileName = $file["name"]; 
            $tempFile = $file["tmp_name"]; 
            $fileSize = $file["size"];

            if($fileName == ''){
                $query = "INSERT INTO shop(shopTitle) VALUES('$tenantName')";
                $connection->query($query);

            } else {
                
                if($fileSize < 2000000){

                    $extensionList = array('.jpg', '.jpeg', '.png', '.gif', '.svg');
                    $extension = substr($fileName, strpos($fileName, '.'), strlen($fileName));

                    if(in_array($extension, $extensionList, TRUE)){

                        $location = './img/shop/'.$tenantName.$extension;
                        move_uploaded_file($tempFile, $location); 

                        $query = "INSERT INTO shop(shopTitle, imgUrl) VALUES('$tenantName', '$location')";
                        $connection->query($query);

                    } else {
                        echo "<script>alert('Unsupported datatype')</script>";
                    }

                } else {
                    echo "<script>alert('2MB size limit exceeded')</script>";
                }

            }

            $query = "INSERT INTO users(name, email, phoneNumber, userPassword, userRole) VALUES('$tenantName', '$tenantEmail', '$tenantPhoneNumber', '$password', 'tenant')";
            $connection->query($query);

            mail('$tenantEmail', 'Successfully Created Tenant', 'You can login with your new password now: '.$password);

            header('Location: ./managetenant.php');


            }

        }


    if(isset($_POST['cancel'])){
        header('Location: ./managetenant.php');
    }

?>