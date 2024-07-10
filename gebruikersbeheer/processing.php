<?php
session_start();
$currentPage = "klanten";
require("inlogCheck.php");

  //Determine what to do
  switch ($_POST["type"]) {
    case "Gebruiker Toevoegen":
      addUser();
      break;

    case "Gebruiker Verwijderen":
      deleteUser();
      break;

    case "Gebruiker Bewerken":
      editUser();
      break;
    
    default:
      echo("Something went wrong");
      
      break;
  }


  //Add user
  function addUser(){
    include("database/dhb.php");

    

    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    checkUsername($username, null);


    // $stmt = $dhb->prepare("INSERT INTO User (Username, Password, Role) VALUES (?, ?, ?)");
    // $stmt->bind_param("ssi", $username, $password, $role);
    // $stmt->execute();
    $stmt = $dhb->prepare("INSERT INTO  User (Username, Password, Role)
    VALUES (:Username, :Password, :Role)");
    $stmt->bindParam(':Username', $username);
    $stmt->bindParam(':Password', $password);
    $stmt->bindParam(':Role', $role);
    $stmt->execute();

    echo("yay?");

  }

  function deleteUser(){
    include("database/dhb.php");

    $userID = $_POST["user"];

    // $stmt = $dhb->prepare("INSERT INTO User (Username, Password, Role) VALUES (?, ?, ?)");
    // $stmt->bind_param("ssi", $username, $password, $role);
    // $stmt->execute();
    
    $query = "DELETE FROM `user` WHERE UserID = $userID";
    $dhb->query($query);

    echo("yay?");

  }

  function editUser(){
    include("database/dhb.php");

    $uid = $_POST["uid"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    
    checkUsername($username, $uid);

    // $stmt = $dhb->prepare("INSERT INTO User (Username, Password, Role) VALUES (?, ?, ?)");
    // $stmt->bind_param("ssi", $username, $password, $role);
    // $stmt->execute();

    $dhb -> query("UPDATE `User` SET `Username`=\"$username\" WHERE UserID=$uid");
    $dhb -> query("UPDATE `User` SET `Password`=\"$password\" WHERE UserID=$uid");
    $dhb -> query("UPDATE `User` SET  `Role`=\"$role\" WHERE UserID=$uid");
    

    echo("edited succesfully?");

  }
  
  function checkUsername($username, $uid){
    if(!isset($uid)){
      $uid = -1;
    }
    include("database/dhb.php");
    $users = $dhb -> query("SELECT `Username` FROM `User` WHERE `Username` = \"$username\" AND NOT `UserID` = $uid ") -> fetch();

    if(gettype($users) != "boolean"){
      $error = "Gebruiker bestaat al";
      include("gebruikersbeheer/error.php");
      exit;
    }
  }
?>