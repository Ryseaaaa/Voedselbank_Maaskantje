<?php
if((isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) != true){
    session_unset();
    session_destroy();
    session_start();
    $_SESSION["loginError"] = "You are not logged in";
    header("location: account.php");
    exit();
}

//needs to include permission validation too
?>