<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Voedselpakketten</title>
  <?php include("common/styles.php"); ?>
</head>
<body>
  <?php 
  session_start();
  // checks if logged in user is actually the correct role, if not it sends back the user to index
  $currentPage = "voedselpaketten";  
  
  include("common/navbar.php"); 
  include("login/loginvalidation.php");

  if(isset($_GET["displaytype"])){
    //first make sure theres a way to return
    echo("<p><a href=\"voedselpakketten.php\">Terug naar keuzemenu</a></p>");

    //then display requested display type
    switch ($_GET["displaytype"]) {
      case "displayKlanten":
        include("voedselpakketten/displayklanten.php");
        break;

      case "displayVoedselpakketten":
        include("voedselpakketten/displayvoedselpakketten.php");
        break;

      case "newVoedselpakket":
        include("voedselpakketten/newvoedselpakket.php");
        break;

      case "addToVoedselpakket":
        include("voedselpakketten/addtovoedselpakket.php");
        break;

      case "processing":
        include("voedselpakketten/processing.php");
        break;
  

      default:
        header("location: voedselpakketten.php");
        break;
    }

  }else{
    include("voedselpakketten/ask.php");
  }
  ?>
  
</body>
</html>