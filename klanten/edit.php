<?php
//check if account is selected
  if(!isset($_GET["id"])){
    echo("none selected");
    include("edit/selectklant.php");
  }else{
    echo("account met ID ".$_GET["id"]." geselecteerd");
    include("edit/editklant.php");
  }
?>
