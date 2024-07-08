<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leveranciers</title>
  <?php include("common/styles.php"); ?>
</head>
<body>
<?php
  session_start();

$currentPage = "leveranciers";
include("./inlogCheck.php");

  include("login/loginvalidation.php");
  include("common/navbar.php");

    if(isset($_GET["displaytype"])){
        //first make sure theres a way to return
        echo("<p><a href=\"leveranciers.php\">Terug naar selectie</a></p>");

        //then display requested display type
        switch ($_GET["displaytype"]) {
            case "display":
                include("leveranciers/display.php");
                break;
            case "delete":
                include("leveranciers/delete.php");
                break;
            case "add":
                include("leveranciers/add.php");
                break;
            case "processing":
                include("leveranciers/processing.php");
                break;
            default:
                header("location: leveranciers.php");
                break;
        }

    }else{
        include("leveranciers/ask.php");
    }
  ?>
</body>
</html>