<?php
    session_start();
    include "./connection.php";
    include "./includes/addnewadminlogic.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>

<?php include "./includes/header.php" ?>
    <div class="wide-container">
        <form class='settings-form' action='./addnewadmin.php' method='POST'>
    
            <div class="settings-item">
                <label for="">Admin Name</label>
                <input class='form-control' name='adminname' type='text' placeholder='Input admin name'>
            </div>

            <div class="settings-item">
                <label for="">Email</label>
                <input class='form-control' name='adminemail' type='email' placeholder='Input email'>
            </div>

            <div class="settings-item">
                <label for="" >Phone Number</label>
                <input class='form-control' name='adminphonenumber' type='text' placeholder='Input phone number'>
            </div>

            <div class="settings-item">
                <label for="">Gender</label><br>
                <input type='radio' name='gender' value='Male' checked>
                <label>Male</label>
                <input type='radio' name='gender' value='Female'>
                <label>Female</label>
            </div>
            
            <div class="button-grouping">
                <button class="btn btn-primary" name="save" >Save</button>
                <button class="btn btn-primary" name="cancel" >Cancel</button>
            </div>
        </form>
    </div>
</body>
</html>