<form action="leveranciers.php?displaytype=processing" method="POST">
    bedrijfsnaam: <input type="text" name="naamBedrijf" required> <br>
    adres: <input type="text" name="adres" required> <br>
    naam contactpersoon: <input type="text" name="naamPersoon" required> <br>
    emailadres cointactpersoon: <input type="email" name="email" required> <br>
    telefoon contactpersoon: <input type="tel" name="telefoon" placeholder="31 6 12345678" required> <br>
    datum volgende levering: <input type="date" name="date"> <br>
    <input type="submit" value="leverancier Toevoegen" name="type">
</form>