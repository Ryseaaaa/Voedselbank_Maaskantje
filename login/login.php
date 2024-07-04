<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include ("common/styles.php")?>
  <title>Voedselbank Maaskantje</title>
</head>
<body>
<?php
        session_start();
        include("../common/navbar.php");
        if($_SESSION["loggedIn"] != true){
          header("location: account.php");
        }
?>
    <header class="header">
        <div class="header-container">
            <img class="logo" alt="logo" src="../images/logo_voedselbank.png"/>
            <span class="header-name" href="index.php">Voedselbank Maaskantje</span>
        </div>    
    </header>
    <main>
        <section class="section-login">
            <h2 class="heading-secondary-form">Login</h2>
<?php
    echo '
    <form class="login-form" action="account.php" method="POST">
        Name: <input type="text" name="username">
        Password: <input type="password" name="password">
        Submit: <input type="submit" class="button-form" name="submit" value="Login">
    </form>
    ';
?>
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