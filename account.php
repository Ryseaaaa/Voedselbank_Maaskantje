<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account</title>
  <?php include("common/styles.php"); ?>
</head>
<body>
  <?php 
  session_start();

  include("common/navbar.php"); 

  print_r($_POST);


  //POST login
  if(isset($_POST["submit"]) && $_POST["submit"] == "Login"){
    $username = "user";
    $password = "pass";

    if($_POST["username"] == $username && $_POST["password"] == $password ){
      $_SESSION["username"] = $username;
      $_SESSION["password"] = $password;
      $_SESSION["loggedIn"] = true;
    }else{
      session_destroy();
      header("location:account.php");
      exit();
    }

    //when logging in
    
  }

  if((isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) != true){
    session_unset();
    session_destroy();
    include("login/loginform.php");
  }else{
    include("login/account.php");
  }







  
  
  ?>
  <div>login</div>
  
</body>
</html>