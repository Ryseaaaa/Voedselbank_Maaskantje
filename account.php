<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account</title>
  <?php include("common/styles.php"); ?>
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

  include("common/navbar.php"); 
  include("common/header.php");
?>

<div class="content">
<h1 style="margin-top: 15px"  class="inventory margin-right-md"> Login </h1> <!-- print_r($_POST); -->

<?php
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
</div>

  <?php include ("common/footer.php");?>
  
</body>
</html>