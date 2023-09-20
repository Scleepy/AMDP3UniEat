<?php
    session_start();
    include "./connection.php";
    include "./includes/deleteitemlogic.php"; 
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
        <?php echo "<form class='settings-form' action='./deleteitem.php?itemID=$itemID' method='POST'>" ?>
            <div>
                <h1>Delete Item?</h1>
                <?php include "./includes/includeitemimage.php" ?>
            </div>
            
            <div class="settings-item">
                <label for="" >Name</label>
                <?php echo "<input class='form-control' name='itemname' type='text' value='$itemName' disabled>" ?>
            </div>

            <div class="settings-item">
                <label for="" >Price</label>
                <?php echo "<input class='form-control' name='itemprice' type='number' value='$itemPrice' disabled>" ?>
            </div>

            <div class="settings-item">
                <label for="" >Description</label>
                <?php echo "<input class='form-control' name='itemdescription' type='text' value='$itemDesc' disabled>" ?>
            </div>
            
            <button class="btn btn-primary" name="delete" >Delete Item</button>
            <button class="btn btn-primary" name="cancel" >Cancel</button>
        </form>
    </div>
</body>
</html>