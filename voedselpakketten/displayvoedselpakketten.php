<?php
  $query = "SELECT VoedselpakketID, GezinsNaam, DatumCreatie, DatumUitgifte
  FROM voedselpakket LEFT JOIN klant ON KlantFID = KlantID
  WHERE isGedeactiveerd = 0";


  //filter afgegeven
  if (!isset($_GET["filter_afgegeven"])){
    $_GET["filter_afgegeven"] = "default";
  }

  switch ($_GET["filter_afgegeven"]) {
    case "hide_afgegeven":
      $query .= " AND DatumUitgifte IS NULL";
      break;

    case "hide_onafgegeven":
      $query .= " AND DatumUitgifte IS NOT NULL";
      break;

    case "show_all":
      break;
    
    default:
      $query .= " AND DatumUitgifte IS NULL";
      break;
  };


  //sorting
  if (!isset($_GET["sort_type"])){
    $_GET["sort_type"] = "default";
  }

  switch ($_GET["sort_type"]) {
    case "gezinsnaam":
      $query .= " ORDER BY GezinsNaam";
      break;

    case "creatiedatum":
      $query .= " ORDER BY DatumCreatie";
      break;

    case "uitgiftedatum":
      $query .= " ORDER BY DatumUitgifte";
      break;
    
    default:
      $query .= " ORDER BY DatumCreatie";
      break;
  };


  include "database/dhb.php";
  $result = $dhb -> query($query) -> fetchAll(PDO::FETCH_NUM);

?>

<!-- sorting form -->
<form action=voedselpakketten.php method=GET>
  <input hidden name=displaytype value="displayVoedselpakketten">
  <select name="filter_afgegeven">
    <option value="show_all">Niet filteren</option>
    <option selected value="hide_afgegeven">Uitgegeven voedselpakketten verbergen</option>
    <option value="hide_onafgegeven">Onuitgegeven voedselpakketten verbergen</option>
    
  </select>

  <select name="sort_type">
    <option value="gezinsnaam">Sorteren op gezinsnaam</option>
    <option value="creatiedatum">Sorteren op creatie datum</option>
    <option value="uitgiftedatum">Sorteren op uitgifte datum</option>
  </select>
  <input type=submit value="Filteren">
</form>
<!-- sorting form -->

</br>

<!-- voedselpakket table -->
<table>
  <tr>
    <th>Voedselpakket ID</th>
    <th>Gezinsnaam</th>
    <th>Creatie Datum</th>
    <th>Uitgifte Datum</th>
    <th>Uitgeven</th>
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
      echo("<td><a href=\"voedselpakketten.php?displaytype=processing&processingtype=markafgifte&voedselpakketid=".$voedselpakket[0]."\">Geef Uit</a></td>");
    }else{
      echo("<td>n.v.t.</td>");
    }

    echo("<td><a href=\"voedselpakketten.php?displaytype=addToVoedselpakket&voedselpakketid=".$voedselpakket[0]."\">Voedselpakket Overzicht</a></td>");

    echo("</tr>");
    
  }
  ?>
</table>
<!-- voedselpakket table -->


