<p>Klant Gegevens:</p>

<?php
  include("database/dhb.php");
  $id = $_GET["klantid"];
  $query = "SELECT GezinsNaam, AantalVolwassenen, AantalKinderen, AantalBabys, ExtraInformatie FROM klant WHERE KlantID = $id";
  $klant = $dhb -> query($query) -> fetch(PDO::FETCH_ASSOC);

  foreach ($klant as $label => $value) {
    echo("<p>$label = $value</p>");
  }

?>
</br>
<form action="voedselpakketten.php?displaytype=processing" method="POST">
  <input type="hidden" name="klantid" value="<?php echo $id;?>">
  <input type="hidden" name="processingtype" value="newvoedselpakket">
  <input type="submit" value="Nieuw Voedselpakket">
</form>