<?php

  include("database/dhb.php");
  $id = $_GET["id"];
  $query = "SELECT * FROM `klant` WHERE KlantID = $id";
  $result = $dhb -> query($query) -> fetch(PDO::FETCH_OBJ);
  foreach ($result as $key => $value) {
    $$key = $value;
  }
  echo "<p>Geselecteerde klant:</p>";
  echo "<p>ID = $id</p>";
  echo "<p>Gezinsnaam = $GezinsNaam</p>";
?>

<form action="klanten.php?displaytype=processing" method="POST">
  <input type="hidden" name="id" value="<?php echo $id;?>">
  Gezins Naam: <input type="text" name="gezinsNaam" value="<?php echo $GezinsNaam;?>">
  Adres: <input type="text" name="adres" value="<?php echo $Adres;?>">
  Telefoonnummer: <input type="tel" name="telefoonnummer" value="<?php echo $Telefoonnummer;?>">
  Email: <input type="email" name="email" value="<?php echo $Email;?>">
  Aantal Volwassenen: <input type="number" min="0" step="1" name="aantalVolwassenen" value="<?php echo $AantalVolwassenen;?>">
  Aantal Kinderen: <input type="number" min="0" step="1" name="aantalKinderen" value="<?php echo $AantalKinderen;?>">
  Aantal Baby's: <input type="number" min="0" step="1" name="aantalBabys" value="<?php echo $AantalBabys;?>">
  Extra Informatie: <input type="text" name="extraInformatie" value="<?php echo $ExtraInformatie;?>">
  Is Gedeactiveerd: <input type="checkbox" name="isGedeactiveerd" value="<?php echo $isGedeactiveerd;?>">

  <input type="submit" value="Klant Bewerken" name="type">
</form>
