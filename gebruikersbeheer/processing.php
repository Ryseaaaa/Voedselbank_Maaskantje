<?php
  //include dhb
  

  //Determine what to do
  switch ($_POST["type"]) {
    case "Gebruiker Toevoegen":
      addUser();
      break;

    case "Gebruiker Verwijderen":
      deleteUser();
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
  

?>