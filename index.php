<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>YIIPEPEPE</title>
  <?php include("common/styles.php");?>
</head>
<body>
  <?php 
  include("common/navbar.php");
  if($_SESSION["loggedIn"] != true){
    header("location:login.php");
  }
  ?>

  <div>
    <p>yipe</p>
  </div>
  
</body>
</html>