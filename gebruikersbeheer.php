<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gebruikersbeheer</title>
  <?php  include("common/styles.php"); ?>
</head>
<body>
  <?php
  session_start();
  include("login/loginvalidation.php");
  include("common/navbar.php");

  //if theres a display type in $_GET
  if(isset($_GET["displaytype"])){
    //first make sure theres a way to return
    echo("<p><a href=\"gebruikersbeheer.php\">Terug naar selectie</a></p>");

    //then display requested display type
    switch ($_GET["displaytype"]) {
      case "display":
        include("gebruikersbeheer/display.php");
        break;
      
      case "add":
        include("gebruikersbeheer/add.php");
        break;

      case "delete":
        include("gebruikersbeheer/delete.php");
        break;

      case "processing":
        include("gebruikersbeheer/processing.php");
        break;

      default:
        header("location: gebruikersbeheer.php");
        break;
    }

  }else{
    include("gebruikersbeheer/ask.php");
  }
  ?>

</body>
</html>