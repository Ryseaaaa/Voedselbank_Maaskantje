<?php
//check if account is selected
  if(!isset($_GET["uid"])){
    echo("none selected");
    include("edit/selectuser.php");
  }else{
    echo("account ".$_GET["uid"]."selected");
    include("edit/edituser.php");
  }
?>
