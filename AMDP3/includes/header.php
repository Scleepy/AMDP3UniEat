<nav class="navbar bg-light">
    <div class="navbar-left">
        <?php
            if(!isset($_SESSION['role']) || $_SESSION['role'] == 'customer'){
                echo "<a class='navbar-brand' href ='./homepage.php'>UniEat</a>";
            } else{
                if ($_SESSION["role"] == "admin"){
                    echo "<a class='navbar-brand' href='./managetenant.php'>UniEat</a>";
                }else {
                    echo "<a class='navbar-brand' href ='./showcurrentorders.php'>UniEat</a>";
                }
            }  
        ?>
    </div>
    <div>
        <form class="d-flex" action="./searching.php" method="POST">
            <input class="form-control" type="text" name="searchfield" placeholder="Search">
            <button class="btn btn-primary" name="search">Search</button>
        </form>
    </div>

    <?php
        if(!isset($_SESSION["email"])){
            include "./includes/navbarrightguest.php";
        } else if ($_SESSION["role"] == "tenant"){
            include "./includes/navbarrighttenant.php";
        } else if ($_SESSION["role"] == "admin"){
            include "./includes/navbarrightadmin.php";
        }else {
            include "./includes/navbarrightcustomer.php";
        }
        
    ?>
</nav>