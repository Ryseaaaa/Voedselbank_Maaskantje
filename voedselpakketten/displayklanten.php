<?php
  include("database/dhb.php");

  $query = "SELECT KlantID, GezinsNaam, AantalVolwassenen, AantalKinderen, AantalBabys, ExtraInformatie FROM klant WHERE isGedeactiveerd = 0";
  $klanten = $dhb -> query($query) -> fetchAll(PDO::FETCH_NUM);

  echo "<table>";
    echo "<tr>";
      echo "<th>KlantID</th>";
      echo "<th>Gezins Naam</th>";
      echo "<th>Aantal Volwassenen</th>";
      echo "<th>Aantal Kinderen</th>";
      echo "<th>Aantal Babys</th>";
      echo "<th>Extra Informatie</th>";
      echo "<th>Maak Voedselpakket Voor Klant</th>";
    echo "</tr>";
  foreach ($klanten as $index => $klant) {
    echo "<tr>";
    foreach ($klant as $key => $value) {
      echo "<td>";
      echo $value;
      echo "</td>";
    }
    echo "<td>";
    echo "<a href=voedselpakketten.php?displaytype=newVoedselpakket&klantid=".$klant["0"].">Maak Voedselpakket</a>";
    echo "</td>";
    echo "</tr>";
  }
  echo "</th>";
  exit;
?>