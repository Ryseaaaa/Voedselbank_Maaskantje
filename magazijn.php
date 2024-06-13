<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include("common/styles.php");?>
  <title>Voedselbank Maaskantje</title>
</head>
<body>
<?php
        session_start();
        include("common/navbar.php");
        if($_SESSION["loggedIn"] != true){
          header("location: account.php");
        }
?>
  <header class="header">
    <div class="header-container">
        <img class="logo" alt="logo" src="images/logo_voedselbank.png"/>
        <span class="header-name" href="index.php">Voedselbank Maaskantje</span>
    </div>
  </header>

  <main>
    <section class="section-magazijn">
      <h1 class="inventory margin-right-md">Voorraad Beheer</h1><br>
        <div class="categorie-container grid grid--3-cols">
            <?php
          $categories = [
            'Categorie 1 (AGF)' => [
              'items' => ['Iets Kruimige Aardappelen' => 26, 'Spinazie' => 18, 'Bananen' => 12],
            ],
            'Categorie 2 (Kaas, Vleeswaren)' => [
              'items' => ['30+ Jong Belegen Plakken Kaas' => 32, 'Kipfilet' => 18, 'Gehakt (varken)' => 14],
            ],
            'Categorie 3 (Zuivel, plantaardig, eieren)' => [
              'items' => ['12 stuks eieren (M)' => 25, 'Halfvolle Melk (1L)' => 34, 'Halvarine 500G' => 15],
            ],
            'Categorie 4 (Bakkerij en Banket)' => [
              'items' => ['Volkoren brood' => 14, 'Sesamvolkoren half' => 23, 'Eierkoek' => 14],
            ],
            'Categorie 5 (Frisdrank, Sappen, Koffie en Thee)' => [
              'items' => ['Engels Melange' => 18, 'Cola Zero' => 27, 'Perziknectar' => 15],
            ],
            'Categorie 6 (Pasta, Rijst en Wereldkeuken)' => [
              'items' => ['Knorr Curry Madras' => 26, 'Zilvervliesrijst (500g)' => 34, 'Penne Rigate' => 29],
            ],
            'Categorie 7 (Soepen, sauzen, kruiden en olie)' => [
              'items' => ['Zonnebloemolie' => 47, 'Heinz Tomatenketchup' => 28, 'Dille' => 19],
            ],
            'Categorie 8 (Snoep, koek, chips en chocolade)' => [
              'items' => ['Spritzkoeken' => 16, 'Winegums' => 24, 'Croky Paprikachips' => 32],
            ],
            'Categorie 9 (Baby, verzorging en hygiëne)' => [
              'items' => ['Babydoekjes' => 9, 'Pampers' => 14, 'Deodorant' => 23],
            ],
          ];

          foreach ($categories as $category => $data) {
            echo '<div class="container-list margin-right-sm">';
            echo '<select class="sorteren">';
            echo 'option value="sorteren">Sorteren</option>';
            echo '</select>';
            echo '<ul class="categorie-list"><b>' . $category . ':</b>';
            foreach ($data['items'] as $item => $quantity) {
              echo '<li class="bulleted-list">' . $item . ':' . $quantity . '</li>';
            }
            echo '</ul></div>';
          }
            ?>
        </div>
    </section>
  </main>
  <footer>
    <div class="grid--2-cols">
        <ul class="voedselbank-info">
            <li class="footer-list-item">Voedselbank Maaskantje en Regionaal</li>
            <li class="footer-list-item">Distributiecentrum</li>
            <li class="footer-list-item">Archangelkade 11 5271 XV Amsterdam</li>
            <li class="footer-list-item">E: info.maaskantje@voedselbank.org</li>
            <li class="footer-list-item">T: 020-63877</li>
        </ul>
    </div>
    <div class="row">
    <p>Stichting Voedselbank Maaskantje wordt door de belastingdienst aangemerkt als ANBI (Algemeen Nut Beogende Instelling) met RSIN 814542499.
    IBAN: NL49 INGB 0004237650</p>
    </div>
  </footer>
  
</body>
</html>