
<button class="btn btn-outline-primary" onclick="window.open('./cart.php', '_self')">Cart</button>

<div class="navbar-right"></div>
    <div class="dropdown user-dropdown-container">
        <button class="btn btn-primary dropdown-toggle" type="button" id="user-dropdown" data-bs-toggle="dropdown">
        <?php echo $_SESSION['name'] ?></button>
        <div class="dropdown-menu" aria-labelledby="user-dropdown">
            <a class="dropdown-item" href="./homepage.php">Home</a>
            <a class="dropdown-item" href="./previousorders.php">History</a>
            <a class="dropdown-item" href="./usersettings.php">Settings</a>
            <a class="dropdown-item" href="./includes/logout.php">Logout</a>
        </div>
    </div>
</div>