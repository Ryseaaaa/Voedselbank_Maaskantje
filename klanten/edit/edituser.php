<?php
  include("database/dhb.php");
  $uid = $_GET["uid"];
  $query = "SELECT * FROM `user` WHERE UserID = $uid";

  include("functions.php");
  $result = $dhb -> query($query) -> fetch();
  $username = $result["Username"];
  $password = $result["Password"];
  $role = $result["Role"];
  $rolestring = roletostring($role);

  echo "<p>Geselecteerde user:</p>";
  echo "<p>ID = $uid</p>";
  echo "<p>Username = $username</p>";
  echo "<p>Wachtwoord = $password</p>";
  echo "<p>Rol = $rolestring</p><br>";
?>

<form action="gebruikersbeheer.php?displaytype=processing" method="POST">
  <input type="hidden" name="uid" value="<?php echo $uid;?>">
  Gebruikersnaam: <input type="text" name="username" value="<?php echo $username;?>">
  Wachtwoord: <input type="text" name="password" value="<?php echo $password;?>">
  Rol: <select name="role">
    <option value="0" <?php if($role == 0){echo("selected=\"selected\"");}?>>Geen rol</option>
    <option value="1" <?php if($role == 1){echo("selected=\"selected\"");}?>>Magazijnmedewerker</option>
    <option value="2" <?php if($role == 2){echo("selected=\"selected\"");}?>>Voedselpakket Vrijwilliger</option>
    <option value="3" <?php if($role == 3){echo("selected=\"selected\"");}?>>Directie</option>
  </select>
  <input type="submit" value="Gebruiker Bewerken" name="type">
</form>
