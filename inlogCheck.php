<?php
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