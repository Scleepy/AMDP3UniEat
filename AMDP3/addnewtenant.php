<?php
    session_start();
    include "./connection.php";
    include "./includes/addnewtenantlogic.php";
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
        <form class='settings-form' action='./addnewtenant.php' method='POST' enctype='multipart/form-data'>

            <div class="settings-item">
                <label for="">Tenant Name</label>
                <input class='form-control' name='tenantname' type='text' placeholder='Input tenant name'>
            </div>

            <div class="settings-item">
                <label for="">Email</label>
                <input class='form-control' name='tenantemail' type='email' placeholder='Input tenant email'>
            </div>

            <div class="settings-item">
                <label for="" >Phone Number</label>
                <input class='form-control' name='tenantphonenumber' type='text' placeholder='input tenant phone number'>
            </div>

            <div>
                <p>Tenant Logo: </p>
                <input type="file" name="file">     
            </div>

            <div class="button-grouping">
                <button class="btn btn-primary" name="save" >Save</button>
                <button class="btn btn-primary" name="cancel" >Cancel</button>
            </div>
        </form>
    </div>
</body>
</html>