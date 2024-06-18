<form action="gebruikersbeheer.php?displaytype=processing" method="POST">
  Welke Gebruiker Wilt U Verwijderen: 
  <select name="user">
    <?php
      include("database/dhb.php");

      $query = "SELECT * FROM `user`";

      $result = $dhb -> query($query);

      //for each user make option
      foreach($result as $query => $user){
        echo("<option value=");

        //for each user property
        foreach($user as $property => $value){
          if($property == "UserID"){
            echo("\"".$value."\">");
          }
          if($property == "Username"){
            echo($value."</option>");
          }
        }
      }
    ?>
  </select>
  <input type="submit" value="Gebruiker Verwijderen" name="type">
</form>