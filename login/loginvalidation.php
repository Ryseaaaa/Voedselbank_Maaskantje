<?php
//check if session exists, just in case :3
if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }

//check if login session is set
if(!
    (   
        isset($_SESSION["loggedIn"]) && 
        $_SESSION["loggedIn"] &&
        isset($_SESSION["user"]) &&
        isset($_SESSION["pass"])
    )
){
    session_unset();
    session_destroy();
    session_start();
    $_SESSION["error"] = "U bent niet ingelogd";
    header("location: TestInlog.php");
    exit();
}

if (!isset($_SESSION["role"])){
    $_SESSION["role"] = 0;
}
$role = $_SESSION["role"];

if ($role == 3) {
    //everything is fine
}

switch ($currentPage) {
    case "klanten";
    case "leveranciers";
    case "gebruikers";
        if ($role == 1 || $role == 2) {
            header("Location: index.php");
        }
        break;
    case "magazijn";
        if ($role == 2) {
            header("Location: index.php");
        }
        break;
    case "voedselpaketten";
        if ($role == 1) {
            header("Location: index.php");
        }
        break;
    default:
        header("Location: index.php");
        break;
}

//needs to include permission validation too
?>