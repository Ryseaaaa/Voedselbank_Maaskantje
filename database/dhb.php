<?php
//Connect DB
$dhb;
  try{

  $host = 'localhost';
  $port = '3306';
  $user = 'root';
  $pass = '';
  $db = 'voedselbank maaskantje';


  $dhb = new PDO(
    "mysql:host=$host;dbname=$db;port=$port",
    $user,
    $pass
  );

}catch(PDOException $e){
  echo $e->getMessage();
}
//
?>