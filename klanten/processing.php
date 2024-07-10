<?php

session_start();
$currentPage = "klanten";
require("inlogCheck.php");

//Determine what to do
  switch ($_POST["type"]) {
    case "Klant Toevoegen":
      addKlant();
      break;

    case "Klant Bewerken":
      editKlant();
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

  function editKlant(){


    include("database/dhb.php");

      $id = $_POST["id"];
      $gezinsNaam = $_POST["gezinsNaam"];
      $adres = $_POST["adres"];
      $telefoonnummer = $_POST["telefoonnummer"];
      $email = $_POST["email"];
      $aantalVolwassenen = $_POST["aantalVolwassenen"];
      $aantalKinderen = $_POST["aantalKinderen"];
      $aantalBabys = $_POST["aantalBabys"];
      $extraInformatie = $_POST["extraInformatie"];
      $isGedeactiveerd = isset($_POST["isGedeactiveerd"]);



    try {
      $dhb -> query("UPDATE `Klant` SET `GezinsNaam`=\"$gezinsNaam\" WHERE KlantID=$id");
      $dhb -> query("UPDATE `Klant` SET `Adres`=\"$adres\" WHERE KlantID=$id");
      $dhb -> query("UPDATE `Klant` SET `Telefoonnummer`=\"$telefoonnummer\" WHERE KlantID=$id");
      $dhb -> query("UPDATE `Klant` SET `Email`=\"$email\" WHERE KlantID=$id");
      $dhb -> query("UPDATE `Klant` SET `AantalVolwassenen`=\"$aantalVolwassenen\" WHERE KlantID=$id");
      $dhb -> query("UPDATE `Klant` SET `AantalKinderen`=\"$aantalKinderen\" WHERE KlantID=$id");
      $dhb -> query("UPDATE `Klant` SET `AantalBabys`=\"$aantalBabys\" WHERE KlantID=$id");
      $dhb -> query("UPDATE `Klant` SET `ExtraInformatie`=\"$extraInformatie\" WHERE KlantID=$id");
      $dhb -> query("UPDATE `Klant` SET `isGedeactiveerd`=\"".($isGedeactiveerd ? 1 : 0)."\" WHERE KlantID=$id");
      echo("edited succesfully?");
    } catch (Exception $e) {
      echo($e);
    }
  }
?>