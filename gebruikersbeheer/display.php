<?php
//should come with search function using get

  include("database/dhb.php");
  include("functions.php");
  //list password
  $query = "SELECT * FROM `user`";


  $result = $dhb -> query($query);
  
  //start table
  echo("
  <table>
    <tr>
      <th>User ID</th>
      <th>Username</th>
      <th>Password</th>
      <th>Role</th>
    </tr>
  ");

  //for each user
  foreach($result as $query => $user){
    echo("
    <tr>
    ");

    //for each user property
    foreach($user as $property => $value){
      if($property == "UserID"){
        echo("<td>".$value."</td>");
      }
      if($property == "Username"){
        echo("<td>".$value."</td>");
      }
      if($property == "Password"){
        echo("<td>".$value."</td>");
      }
      if($property == "Role"){
        echo("<td>".roletostring($value)."</td>");
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