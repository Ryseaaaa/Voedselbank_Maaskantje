
<?php
session_start();
        include("common/navbar.php");
        include("common/styles.php");
        if($_SESSION["loggedIn"] != true){
          header("location: account.php");
        }

echo '
<form action="response.php" method="POST" class="inlogForm">
        <label for="name"><b>Username</b></label> <br>
        <input type="username" name="username" placeholder="username:" required class="inputField"> <br>

        <label for="pass"><b>Password</b></label> <br>
        <input type="password" name="pass" placeholder="password:" required class="inputField"> <br>

        <input type="submit" value="login" class="submitBTN">
    </form>
    ';
