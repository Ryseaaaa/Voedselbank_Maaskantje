<form action="gebruikersbeheer.php" method="GET">
  Kies een gebruiker om te bewerken
  <select name="uid">
    <?php
      include("database/dhb.php");
      $query = "SELECT * FROM `user`";
      $result = $dhb -> query($query);
      print_r($result);
      
      foreach ($result as list($uid, $username)) {
        echo("<option value=$uid>$username</option>");
      }
    ?>
  </select>
  <input type="submit" name="displaytype" value="edit">
</form>