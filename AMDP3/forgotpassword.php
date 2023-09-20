<?php
    include "./connection.php";

    if(isset($_POST["submit"])){

        $email = trim($_POST["email"]);

        $query = "SELECT * FROM users WHERE email = '$email';";

        $result = $connection->query($query);
        $row = $result->fetch_assoc();

        if($result->num_rows != 0){

            $alphabet = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
            $numbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
            $newPassword = '';

            for($i = 0; $i < 5; $i++) $newPassword = $newPassword . $alphabet[rand(0, sizeof($alphabet) - 1)];
            for($i = 5; $i < 8; $i++) $newPassword = $newPassword . $numbers[rand(0, sizeof($numbers) - 1)];

            $query = "UPDATE users SET userPassword = '$newPassword' WHERE email = '$email';";
            $result = $connection->query($query);

            if($result = true){
                mail('$email', 'UniEat Password Change Successful', 'You can login with your new password now: '.$newPassword);

                header('Location: login.php');
            }

        } else {
            echo "<script>alert('Email does not exist, please check again')</script>";
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
        <h1>UniEat</h1>
        <form class="register-form" action="./forgotpassword.php" method="POST">
            <input class="form-control" name="email" type="text" placeholder="Email">

            <button class="btn btn-primary" name="submit" >Reset Password</button>
            <a class="blue-redirect" onclick="window.open('./login.php', '_self')">Back to Login</a>
        </form>
    </div>
</body>
</html>