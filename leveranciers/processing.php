<?php

session_start();
$currentPage = "klanten";
require("inlogCheck.php");
  //include dhb
  

  //Determine what to do
  switch ($_POST["type"]) {
    case "leverancier Toevoegen":
      addLeverancier();
      break;

    case "leverancier Verwijderen":
      deleteUser();
      break;
    
    default:
      echo("Something went wrong");
      
      break;
  }


  //Add user
  function addLeverancier(){
    include("database/dhb.php");

    $naamBedrijf = $_POST["naamBedrijf"];
    $adres = $_POST["adres"];
    $persoon = $_POST["naamPersoon"];
    $email = $_POST["email"];
    $phone = $_POST["telefoon"];
    $date = $_POST["date"];

    // $stmt = $dhb->prepare("INSERT INTO User (Username, Password, Role) VALUES (?, ?, ?)");
    // $stmt->bind_param("ssi", $username, $password, $role);
    // $stmt->execute();
    $stmt = $dhb->prepare("INSERT INTO  leverancier (Bedrijfsnaam, Adres, ContactNaam, Email, Telefoon, VolgendeLevering)
    VALUES (:NaamBedrijf, :Adres, :ContactPersoon, :Email, :Phone, :Date)");
    $stmt->bindParam(':NaamBedrijf', $naamBedrijf);
    $stmt->bindParam(':Adres', $adres);
    $stmt->bindParam(':ContactPersoon', $persoon);
    $stmt->bindParam(':Email', $email);
    $stmt->bindParam(':Phone', $phone);
    $stmt->bindParam(':Date', $date);
    $stmt->execute();

    echo("yay?");

  }

  function deleteUser(){
    include("database/dhb.php");

    $userID = $_POST["user"];

    // $stmt = $dhb->prepare("INSERT INTO User (Username, Password, Role) VALUES (?, ?, ?)");
    // $stmt->bind_param("ssi", $username, $password, $role);
    // $stmt->execute();
    
    $query = "DELETE FROM `leverancier` WHERE UserID = $userID";
    $dhb->query($query);

    echo("yay?");

  }
  

?>