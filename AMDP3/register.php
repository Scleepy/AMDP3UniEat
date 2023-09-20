<?php 
    include "./connection.php";

    if(isset($_POST["submit"])){

        $username = trim($_POST["username"]);
        $email = trim($_POST["email"]);
        $phonenumber = trim($_POST["phonenumber"]);
        $password = trim($_POST["password"]);
        $confirmpassword = trim($_POST["confirmpassword"]);
        

        $usernameValid = true;
        $emailValid = true;
        $phoneNumberValid = true;
        $passwordValid = true;
        $confirmpasswordValid = true;


        if(strlen($username) < 5 || !ctype_alpha(str_replace(' ', '',$username))){
            $usernameValid = false;
        }

        if($email == '' || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailValid = false;
        }

        if(substr($phonenumber, 0, 1) == '+'){
            if(!is_numeric(substr($phonenumber, 1, strlen($phonenumber) - 1)) || (strlen($phonenumber) - 1) < 10){
                $phoneNumberValid = false;
            }
        } else {

            if(!is_numeric(substr($phonenumber, 1, strlen($phonenumber) - 1)) || (strlen($phonenumber) - 1) < 10){
                $phoneNumberValid = false;
            }
        }

        if(strlen($password) < 6){
            $passwordValid = false;
        }

        if($confirmpassword == '' || strcmp($password, $confirmpassword) != 0){
            $confirmpasswordValid = false;
        }


        if (!$usernameValid || !$emailValid || !$phoneNumberValid || !$passwordValid || !$confirmpasswordValid){
            echo "<script>alert('Registration failed, please check your data')</script>";
        } else {

            $query = "INSERT INTO users(name, email, phoneNumber, userPassword) VALUES('$username', '$email', '$phonenumber', '$password');";
            $result = $connection->query($query);

            if($result = true){
                mail('$email', 'UniEat Registration Successful', 'You can login with your credentials now');

                header('Location: login.php');
            }

        }
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
    <div class="register-form-container" >
        <h1 onclick="window.open('./homepage.php', '_self')" >UniEat</h1>
        <form class="register-form" action="./register.php" method="POST">
            <input class="form-control" name="email" type="text" placeholder="Email">
            <input class="form-control" name="username" type="text" placeholder="Username">
            <input class="form-control" name="phonenumber" type="text" placeholder="Phone Number">
            <input class="form-control" name="password" type="password" placeholder="Password">
            <input class="form-control" name="confirmpassword" type="password" placeholder="Confirm Password">
            
            <button class="btn btn-primary" name="submit">Register</button>
            <p>Already have an account? <a class="blue-redirect" onclick="window.open('./login.php', '_self')">Login</a></p>
        </form>
    </div>
</body>
</html>