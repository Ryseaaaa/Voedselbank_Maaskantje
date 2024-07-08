<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gebruikersbeheer</title>
  <?php  include("common/styles.php"); ?>
  <style>
    html, body {
      height: 100%;
      margin: 0;
      display: flex;
      flex-direction: column;
    }
    .content {
      flex: 1;
      display: flex;
      flex-direction: column;
    }
    footer {
      padding: 10px;
      text-align: center;
    }
  </style>
</head>
<body>
  <?php
  session_start();
  $currentPage = "gebruikers";
  include("./inlogCheck.php");

  include("login/loginvalidation.php");
  include("common/navbar.php");
  include("common/header.php");

  ?>
  <div class="content">
  <h1 style="margin-top: 15px"  class="inventory margin-right-md"> Gebruikersbeheer </h1>
  <?php

  //if theres a display type in $_GET
  if(isset($_GET["displaytype"])){
    //first make sure theres a way to return
    echo("<p><a href=\"gebruikersbeheer.php\">Terug naar keuzemenu</a></p>");

    //then display requested display type
    switch ($_GET["displaytype"]) {
      case "display":
        include("gebruikersbeheer/display.php");
        break;
      
      case "add":
        include("gebruikersbeheer/add.php");
        break;

      case "processing":
        include("gebruikersbeheer/processing.php");
        break;

      case "edit":
      case "Bewerken":
        include("gebruikersbeheer/edit.php");
        break;

      default:
        header("location: gebruikersbeheer.php");
        break;
    }

  }else{
    include("gebruikersbeheer/ask.php");
  }
  ?>
  </div>

  <?php include("common/footer.php"); ?>

</body>
</html>