<?php 
    include "./connection.php";

    if(isset($_POST["submit"])){

        $emailusername = trim($_POST["emailusername"]);
        $password = trim($_POST["password"]);

        $query;

        if(str_contains($emailusername, '@')){
            $query = "SELECT * FROM users WHERE email = '$emailusername' AND userPassword = '$password';";
        } else {
            $query = "SELECT * FROM users WHERE name = '$emailusername' AND userPassword = '$password';";
        }

        $result = $connection->query($query);

        if($result->num_rows != 0){
            
            session_start();
            $row = $result->fetch_assoc();

            $_SESSION['userID'] = $row['userID'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['password'] = $row['userPassword'];
            $_SESSION['role'] = trim($row['userRole']);
            setcookie("online", "true", time() + (60 * 60 * 24));

            if(trim($row['userRole']) == 'admin'){
                header('Location: managetenant.php');
            } else if (trim($row['userRole']) == 'tenant'){
                header('Location: showcurrentorders.php');
            } else {
                header('Location: homepage.php');
            }

            
        } else {
            echo "<script>alert('Login failed, please check your credentials')</script>";
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
        <form class="register-form" action="./login.php" method="POST">
            <input class="form-control" name="emailusername" type="text" placeholder="Email/Username">
            <input class="form-control" name="password" type="password" placeholder="Password">
            <a class="blue-redirect" onclick="window.open('./forgotpassword.php', '_self')">Forgot your password?</a>

            <button class="btn btn-primary" name="submit" >Login</button>
            <p>Don't have an account? <a class="blue-redirect" onclick="window.open('./register.php', '_self')">Register</a></p>
        </form>
    </div>
</body>
</html>