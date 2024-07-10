<nav class=nav-container>
  <ul class="nav-list">
    <li class="nav-item"><a href="index.php">Home</a></li>
      <?php
      if (!isset($_SESSION["role"])){
        $_SESSION["role"] = 0;
      }

      if ($_SESSION["role"] == 3) {
          echo '<li class="nav-item"><a href="klanten.php">Klanten</a></li>
                <li class="nav-item"><a href="leveranciers.php">Leveranciers</a></li>
                <li class="nav-item"><a href="gebruikersbeheer.php">Gebruikersbeheer</a></li>';
      }

      if ($_SESSION["role"] == 2 || $_SESSION["role"] == 3) {
          echo '<li class="nav-item"><a href="voedselpakketten.php">Voedselpakketten</a></li>';
      }

      if ($_SESSION["role"] == 1 || $_SESSION["role"] == 3) {
          echo '<li class="nav-item"><a href="magazijn.php">Magazijn</a></li>';
      }
      ?>
      
    <li class="nav-item"><a href="TestInlog.php">Account</a></li>
  </ul>

<script src="common/navbar.js"></script>
</nav>