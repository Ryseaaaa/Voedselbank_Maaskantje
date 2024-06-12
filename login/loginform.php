<?php
if(isset($_SESSION["loginerror"])){
  echo("<p>Er ging iets mis: ".$_SESSION["loginerror"]."</p>");
}
?>

<form action="account.php" method="POST">
Name:<input type="text" name="username">
Password:<input type="password" name="password">
Submit:<input type="submit" name="submit" value="Login">
</form>