<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Klanten</title>
  <?php  include("common/styles.php"); ?>
</head>
<body>
<?php
  session_start();
  $currentPage = "klanten";
  include("login/loginvalidation.php");
  include("common/navbar.php");

  //if theres a display type in $_GET
  if(isset($_GET["displaytype"])){
    //first make sure theres a way to return
    echo("<p><a href=\"klanten.php\">Terug naar keuzemenu</a></p>");

    //then display requested display type
    switch ($_GET["displaytype"]) {
      case "display":
        include("klanten/display.php");
        break;

      case "add":
        include("klanten/add.php");
        break;

      case "edit":
      case "Bewerken":
        include("klanten/edit.php");
        break;

      case "processing":
        include("klanten/processing.php");
        break;

      default:
        header("location: klanten.php");
        break;
    }

  }else{
    include("klanten/ask.php");
  }
  ?>

</body>
</html>