<?php 
    include "./connection.php";
    session_start();
    include "./includes/itemdetaillogic.php";
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
    
    <?php include "./includes/header.php"; ?>

    <div class="div-container" >
        <div class="div-container-inner">
            <div class='shop-item-container item-detail'>
                <?php echo "<img src='$itemImgUrl'>" ?>
                <div class='shop-info'>
                    <?php echo "<h4>$itemTitle</h4>" ?>
                    <?php echo "<p>$itemDescription</p>" ?>
                    <?php echo "<p>$itemPrice</p>" ?>
                </div>
            </div>

            <div class="item-detail-form">
                <form action='./itemdetail.php?shopID=<?php echo $shopID ?>&itemID=<?php echo $itemID ?>' method="POST">
                    <div>
                        <label for="">Notes</label>
                        <input class="form-control" name="notes" type="text" placeholder="Optional notes">
                    </div>

                    <div class="amount-container">
                        <button class="btn btn-primary" id="button-minus" type="button">-</button>
                        <input id="input-amount" class="form-control" name="amount" type="text" value="1" readonly>
                        <button class="btn btn-primary" id="button-add" type="button">+</button>
                    </div>
                    <button class="btn btn-primary" name="submit" >Add to Cart</button>
                </form>
            </div>
        </div>
    </div>

    <script src="./js/additem.js"></script>
</body>
</html>