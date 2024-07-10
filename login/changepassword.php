<?php


  echo(isset($_SESSION["error"]) ? "<p>Er ging iets mis: ".$_SESSION["error"]."</p>" : "");
  unset($_SESSION["error"]);

  if(!(isset($_POST["passwordCurrent"]) && isset($_POST["passwordNew"]))){
    passwordform();
    exit;
  }else{
    checkpassword();
  }


  function passwordform(){
    echo "
    <form action=\"TestInlog.php?display=changepassword\" method=\"POST\" class=\"inlogForm\">
      Huidig wachtwoord: <input type=text name=passwordCurrent>
      Nieuw wachtwoord: <input type=text name=passwordNew>
      <input type=submit value=\"Wachtwoord Wijzigen\">
    </form>
    ";
  }

  function checkpassword(){
    $username = $_SESSION["user"];
    $current = $_POST["passwordCurrent"];
    $new = $_POST["passwordNew"];

    //check if current password is correct;
    include("database/dhb.php");
    
    $stmt = $dhb -> prepare("SELECT `Password` FROM User WHERE Username = (:username)");
    $stmt -> bindParam(":username", $username);
    $stmt -> execute() ;
    $real = $stmt -> fetch(PDO::FETCH_NUM)[0];


    if($real == $current){
      //change pass in db
      $stmt = $dhb -> prepare("UPDATE User SET `Password` = (:newpassword) WHERE Username = (:username)");
      $stmt -> bindParam(":username", $username);
      $stmt -> bindParam(":newpassword", $new);
      $stmt -> execute(); 

      //set session to new pass
      $_SESSION["pass"] = $new;

      //redirect to account.php with header
      header("location: TestInlog.php");

      exit;
    }else{
      echo "password not match";
      //throw error to session
      $_SESSION["error"] = "Ingevuld huidig wachtwoord is incorrect";
      
      //redirect to changepassword with header
      header("location: TestInlog.php?display=changepassword");
      exit;
    }

    
    
  }