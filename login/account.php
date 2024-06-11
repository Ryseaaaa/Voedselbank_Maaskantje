<?php
  include("database/dhb.php");

  //list password
  $query = "SELECT * FROM `user`";


  $result = $dhb -> query($query);

  print_r($result); 
  foreach($result as $query => $user){
    
    print_r($user);
    
    foreach($user as $valuetype => $value){
      //echo("<p>".$user["UserID"]."</p>");
      echo("<p>".$valuetype." = ".$value."</p>");
    }
  }

?>

<p>logged in</p>
<a href="logout.php">log out</a>