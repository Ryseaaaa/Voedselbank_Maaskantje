<?php
  //Determine what to do
  switch ($_POST["type"]) {
    case "Klant Toevoegen":
      addKlant();
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
  function addKlant(){
    include("database/dhb.php");

    
    print_r($_POST);
    //converts all post variables into variables
    foreach ($_POST as $key => $value) {
      $$key = $value;
    }
    
    $id = $dhb->query("SELECT MAX(KlantID) FROM Klant")->fetch()[0] + 1;


    $stmt = $dhb->prepare("INSERT INTO  Klant (
        KlantID,
        GezinsNaam, 
        Adres, 
        Telefoonnummer,
        Email,
        AantalVolwassenen,
        AantalKinderen,
        AantalBabys,
        ExtraInformatie
        )
      VALUES (
      :KlantID,
      :GezinsNaam, 
      :Adres, 
      :Telefoonnummer,
      :Email,
      :AantalVolwassenen,
      :AantalKinderen,
      :AantalBabys,
      :ExtraInformatie
      )"
    );
    $stmt->bindParam(':KlantID', $id);
    $stmt->bindParam(':GezinsNaam', $gezinsNaam);
    $stmt->bindParam(':Adres', $adres);
    $stmt->bindParam(':Telefoonnummer', $telefoon);
    $stmt->bindParam(':Email', $email);
    $stmt->bindParam(':AantalVolwassenen', $aantalVolwassenen);
    $stmt->bindParam(':AantalKinderen', $aantalKinderen);
    $stmt->bindParam(':AantalBabys', $aantalBabys);
    $stmt->bindParam(':ExtraInformatie', $extraInformatie);
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