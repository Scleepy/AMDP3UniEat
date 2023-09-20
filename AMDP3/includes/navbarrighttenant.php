
<div class="navbar-right"></div>
    <div class="dropdown user-dropdown-container">
        <button class="btn btn-primary dropdown-toggle" type="button" id="user-dropdown" data-bs-toggle="dropdown">
        <?php echo $_SESSION['name'] ?></button>
        <div class="dropdown-menu" aria-labelledby="user-dropdown">
            <a class="dropdown-item" href="./showcurrentorders.php">Home</a>
            <a class="dropdown-item" href="./tenantcompletedorders.php">Completed Orders</a>
            <a class="dropdown-item" href="./manageitems.php">Manage Items</a>
            <a class="dropdown-item" href="./tenantsettings.php">Settings</a>
            <a class="dropdown-item" href="./includes/logout.php">Logout</a>
        </div>
    </div>
</div>