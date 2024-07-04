<form action="klanten.php" method="GET">
  Kies een klant om te bewerken
  <select name="id">
    <?php
      include("database/dhb.php");
      $query = "SELECT * FROM `klant`";
      $result = $dhb -> query($query);
      print_r($result);
      
      foreach ($result as list($id, $gezinsnaam)) {
        echo("<option value=$id>ID = $id; Gezinsnaam = $gezinsnaam</option>");
      }
    ?>
  </select>
  <input type="submit" name="displaytype" value="Bewerken">
</form>