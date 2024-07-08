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
  include("./inlogCheck.php");
  
  include("common/navbar.php"); 
  include("login/loginvalidation.php");
  ?>
  <div>voedsel</div>
  
</body>
</html>