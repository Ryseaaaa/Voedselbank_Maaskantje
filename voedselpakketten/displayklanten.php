<?php
  include("database/dhb.php");
  require("login/loginvalidation.php");

  $query = "SELECT KlantID, GezinsNaam, AantalVolwassenen, AantalKinderen, AantalBabys, ExtraInformatie, max(DatumUitgifte) 
  FROM klant
  LEFT JOIN voedselpakket ON KlantID = KlantFID
  WHERE isGedeactiveerd = 0
  GROUP BY KlantID";
  $klanten = $dhb -> query($query) -> fetchAll(PDO::FETCH_NUM);

  echo "<table>";
    echo "<tr>";
      echo "<th>KlantID</th>";
      echo "<th>Gezins Naam</th>";
      echo "<th>Aantal Volwassenen</th>";
      echo "<th>Aantal Kinderen</th>";
      echo "<th>Aantal Babys</th>";
      echo "<th>Extra Informatie</th>";
      echo "<th>Datum Vorige Uitgifte</th>";
      echo "<th>Maak Voedselpakket Voor Klant</th>";
    echo "</tr>";
  foreach ($klanten as $index => $klant) {
    echo "<tr>";
    foreach ($klant as $key => $value) {
      if($value === null || $value == ''){
        $value = "n.v.t";
      }

      echo "<td>";
      echo $value;
      echo "</td>";
    }
    echo "<td>
            <form action=\"voedselpakketten.php?displaytype=processing\" method=\"POST\">
              <input type=\"hidden\" name=\"processingtype\" value=\"newvoedselpakket\">
              <input type=\"hidden\" name=\"klantid\" value=\"".$klant["0"]."\">
              <input type=\"submit\" value=\"+\">
            </form>
          </td>";
    
    echo "</tr>";
  }
  echo "</th>";
  exit;
?>