<form action="klanten.php?displaytype=processing" method="POST">
  Gezinsnaam: <input type="text" name="gezinsNaam">
  Adres: <input type="text" name="adres">
  Telefoonnummer: <input type="tel" name="telefoon">
  Email: <input type="email" name="email">
  Aantal Volwassenen: <input type="number" min="0" step="1" name="aantalVolwassenen">
  Aantal Kinderen: <input type="number" min="0" step="1" name="aantalKinderen">
  Aantal Baby's: <input type="number" min="0" step="1" name="aantalBabys">
  Extra Informatie: <input type="text" name="extraInformatie">
  

  <input type="submit" value="Klant Toevoegen" name="type">
</form>