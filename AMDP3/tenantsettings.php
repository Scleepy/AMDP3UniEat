<?php
    session_start();
    include "./connection.php";
    include "./includes/tenantsettingsupdate.php"; 
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
        <form class="settings-form" action="./tenantsettings.php" method="POST" enctype="multipart/form-data">
            <div>
                <p>Current Logo: </p>
                <?php include "./includes/tenantsettingslogic.php" ?>

                <input type="file" name="file">     
            </div>
            
            <div class="settings-item">
                <label for="" >Name</label>
                <?php echo "<input class='form-control' name='username' type='text' value='$shopName' disabled>" ?>
            </div>

            <div class="settings-item">
                <label for="" >Category</label>
                <?php include "./includes/tenantsettingslogiccategory.php" ?>
            </div>
            <button class="btn btn-primary" name="update" >Update</button>
        </form>
        <button class="btn btn-primary" id="toggle-popup" name="change">Change Password</button>
    </div>

   <dialog id="popup">
      <form action="./tenantsettings.php" method="POST" >
        <h3>Change Password</h3>
          <div class="settings-item">
              <label for="" >Current Password</label>
              <input class='form-control' name='currentpassword' type='password' placeholder="Current Password">
          </div>

          <div class="settings-item">
              <label for="">New Password</label>
              <input class='form-control' name='newpassword' type='password' placeholder="New Password">
          </div>

          <div class="settings-item">
              <label for="">Confirm Password</label>
              <input class='form-control' name='confirmpassword' type='password' placeholder="Confirm Password">
          </div>
          <div class="setting-button-group">
              <button class="btn btn-primary" name="save" >Save</button>
              <button class="btn btn-primary" id="toggle-close" name="cancel">Cancel</button>
          </div>
      </form>
   </dialog>
   
   <script src="./js/togglepopup.js"></script>
</body>
</html>