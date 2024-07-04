<?php
  include("database/dhb.php");

  

?>

<p style="margin-left: 15px; font-size: 20px">You are logged in!</p>
 <!-- Log out button -->
<form action="logout.php" method="post" style="display:inline;">
    <button type="submit" class="logout-button">Log out</button>
</form>

<!-- Optional CSS for styling the button -->
<style>
  .logout-button {
    background-color: #e99a24;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 20px 0px 0px 15px;
    cursor: pointer;
    border-radius: 4px;
  }
</style>