<?php
//should come with search function using get


  include("database/dhb.php");
  include("functions.php");
  
  
  $query = "SELECT * FROM `Klant` WHERE isGedeactiveerd = 0";


  $result = $dhb -> query($query) -> fetchAll(PDO::FETCH_NUM);

  if(gettype($result) === "boolean"){
    echo("<p>Er zijn nog geen klanten</p>");
  }else{
    userTable($result);
  }
  


  function userTable($result){
    //start table
    echo("
    <table>
      <tr>
        <th>Klant ID</th>
        <th>Gezinsnaam</th>
        <th>Adres</th>
        <th>Telefoonnummer</th>
        <th>Email</th>
        <th>Volwassenen</th>
        <th>Kinderen</th>
        <th>Baby's</th>
        <th>Extra Informatie</th>
      </tr>
    ");

    //for each user
    foreach($result as $user){
      echo("
      <tr>
      ");

      //for each user property
      foreach($user as $property => $value){
        if($property == "9") continue;
        echo("<td>$value</td>");
        
      }

      echo("
      </tr>
      ");
    }
    echo("
    </table>
    ");
  }
?>