<?php
  require("login/loginvalidation.php");
  if(!isset($_GET["klantid"])){
    include("addvoedselpakket/askklant.php");
  }else{
    include("addvoedselpakket/newvoedselpakket.php");
  }
?>