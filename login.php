<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <?php include("common/styles.php"); ?>
</head>
<body>
  <?php 
  session_start();

  include("common/navbar.php"); 

  print_r($_POST);

  if(isset($_POST["submit"]) && $_POST["submit"] == "Login"){
    $username = "UWU";
    $password = "OWO";

    if($_POST["username"] == $username && $_POST["password"] == $password ){
      $_SESSION["username"] = $username;
      $_SESSION["password"] = $password;
      $_SESSION["loggedIn"] = true;
    }else{
      session_destroy();
      header("location:login.php");
      exit();
    }
  }

  if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true){
    include("login/account.php");
  }else{
    include("login/loginform.php");
  }

  
  
  ?>
  <div>login</div>
  
</body>
</html>