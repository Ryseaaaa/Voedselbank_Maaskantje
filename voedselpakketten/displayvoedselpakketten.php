<?php
  $query = "SELECT VoedselpakketID, GezinsNaam, DatumCreatie, DatumUitgifte
  FROM voedselpakket LEFT JOIN klant ON KlantFID = KlantID
  "; 

  include "database/dhb.php";
  $result = $dhb -> query($query) -> fetchAll(PDO::FETCH_NUM);

  ?>
  <table>
    <tr>
      <th>Voedselpakket ID</th>
      <th>Gezinsnaam</th>
      <th>Creatie Datum</th>
      <th>Afgifte Datum</th>
      <th>Afgeven</th>
      <th>Overzicht / Bewerken</th>
    </tr>
    <?php
    foreach ($result as $voedselpakket) {
      echo("<tr>");
      $null = false;
      foreach ($voedselpakket as $key => $value) {
        if ($value == null) {
          $value = "n.v.t.";
          $null = true;
        };
        echo("<td>$value</td>");
      }
      if($null) {
        echo("<td><a href=\"voedselpakketten.php?displaytype=processing&processingtype=markafgifte&voedselpakketid=".$voedselpakket[0]."\">Geef Af</a></td>");
      }else{
        echo("<td>n.v.t.</td>");
      }

      echo("<td><a href=\"voedselpakketten.php?displaytype=addToVoedselpakket&voedselpakketid=".$voedselpakket[0]."\">Voedselpakket Overzicht</a></td>");

      echo("</tr>");
      
    }
    ?>
  </table>


