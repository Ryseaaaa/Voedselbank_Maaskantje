<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Medewerker Login</title>
</head>
<body class="body-form">
  <header class="header">
    <div class="header-container">
        <img class="logo" alt="logo" src="images/logo_voedselbank.png"/>
        <span class="header-name" href="index.html">Voedselbank Maaskantje</span>
    </div>
    <nav class="main-nav">
        <ul class="main-nav-list">
            <li><a class="main-nav-link" href="index.html">Home</a></li>
            <li><a class="main-nav-link" href="leveranciers.html">Leveranciers</a></li>
            <li><a class="main-nav-link" href="magazijn.html">Voorraadbeheer</a></li>
            <li><a class="main-nav-link" href="voedselpakketten.html">Voedselpakketten</a></li>
        </ul>
    </nav>
        
  </header>

  <main>
    <section class="section-login">
      <form class="login-form" action="login.php" method="post">

        <h2 class="heading-secondary-form">LOGIN</h2>

        <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>

        <label>Email</label>
        <input type="text" name="email" placeholder="Email" required><br>
        <label>Wachtwoord</label>
        <input type="password" name="wachtwoord" placeholder="Wachtwoord" required><br>
        <input class="checkbox-form"   type="checkbox" checked="checked" name="rememberMe">
        <label>Remember Me</label>
        <button class="button-form"  type="submit">Login</button>

        <div class="form-container">
          <span class="forgot-psw"><a href="#">Forgot password?</a></span>
        </div>
     </form>
    </section>
  </main>
  <footer>
    <div class="grid--2-cols">
        <ul class="voedselbank-info">
            <li>Voedselbank Maaskantje en Regionaal</li>
            <li>Distributiecentrum</li>
            <li>Archangelkade 11 5271 XV Amsterdam</li>
            <li>E: info.maaskantje@voedselbank.org</li>
            <li>T: 020-63877</li>
        </ul>
    </div>
    <div class="row">
    <p>Stichting Voedselbank Maaskantje wordt door de belastingdienst aangemerkt als ANBI (Algemeen Nut Beogende Instelling) met RSIN 814542499.
    IBAN: NL49 INGB 0004237650</p>
    </div>
  </footer>
  
</body>
</html>