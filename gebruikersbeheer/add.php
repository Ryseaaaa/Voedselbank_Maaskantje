<form action="gebruikersbeheer.php?displaytype=processing" method="POST">
  Gebruikersnaam: <input type="text" name="username">
  Wachtwoord: <input type="text" name="password">
  Rol: <select name="role">
    <option value="0">Geen rol</option>
    <option value="1">Magazijnmedewerker</option>
    <option value="2">Voedselpakket Vrijwilliger</option>
    <option value="3">Directie</option>
  </select>
  <input type="submit" value="Gebruiker Toevoegen" name="type">
</form>