<?php
    setcookie("online", NULL, time() - (60 * 60 * 24));
    session_start();
    session_destroy();

    header('Location: ../homepage.php'); 
?>