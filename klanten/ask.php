<?php
$currentPage = "klanten";
?>

<form action="klanten.php" method="GET">
  Wat wilt u doen?
  <select name="displaytype">
    <option value="display">Klanten laten zien</option>
    <option value="add">Klant Toevoegen</option>
    <option value="edit">Klant Bewerken</option>
  </select>
  <input type="submit">
</form>