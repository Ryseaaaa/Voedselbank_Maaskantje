<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$currentPage = "klanten";
require("login/loginvalidation.php");
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

    $id = $dhb->query("SELECT MAX(KlantID) FROM Klant")->fetch()[0] + 1;
    if(gettype($id) != "int") $id = 0; 

    // $stmt = $dhb->prepare("INSERT INTO User (Username, Password, Role) VALUES (?, ?, ?)");
    // $stmt->bind_param("ssi", $username, $password, $role);
    // $stmt->execute();
    $stmt = $dhb->prepare("INSERT INTO  leverancier (LeverancierID, Bedrijfsnaam, Adres, ContactNaam, Email, Telefoon, VolgendeLevering)
    VALUES (:LeverancierID, :NaamBedrijf, :Adres, :ContactPersoon, :Email, :Phone, :Date)");
    $stmt->bindParam(':LeverancierID', $id);
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

    $leverancierID = $_POST["leverancier"];

    // $stmt = $dhb->prepare("INSERT INTO User (Username, Password, Role) VALUES (?, ?, ?)");
    // $stmt->bind_param("ssi", $username, $password, $role);
    // $stmt->execute();
    
    $query = "DELETE FROM `leverancier` WHERE LeverancierID = $leverancierID";
    $dhb->query($query);

    echo("yay?");

  }
?>