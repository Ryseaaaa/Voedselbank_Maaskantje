<?php
//should come with search function using get

  echo("display");

  include("database/dhb.php");
  //list password
  $query = "SELECT * FROM `leverancier`";


  $result = $dhb -> query($query);
  
  //start table
  echo("
  <table>
    <tr>
      <th>Leverancier ID</th>
      <th>NaamBedrijf</th>
      <th>Adres</th>
      <th>ContactPersoon</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Date</th>
    </tr>
  ");

  //for each user
  foreach($result as $query => $user){
    echo("
    <tr>
    ");

    //for each user property
    foreach($user as $property => $value){
      if($property == "LeverancierID"){
        echo("<td>".$value."</td>");
      }
      if($property == "Bedrijfsnaam"){
        echo("<td>".$value."</td>");
      }
      if($property == "Adres"){
        echo("<td>".$value."</td>");
      }
      if($property == "ContactNaam"){
        echo("<td>".$value."</td>");
      }
      if($property == "Email"){
          echo("<td>".$value."</td>");
      }
      if($property == "Telefoon"){
          echo("<td>".$value."</td>");
      }
      if($property == "VolgendeLevering"){
        $value = substr($value,0,10);
          echo("<td>".$value."</td>");
      }
      
    }

    echo("
    </tr>
    ");
  }
  echo("
  </table>
  ");
?>