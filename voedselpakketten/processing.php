<?php
if(isset($_GET["processingtype"])){
  $_POST = $_GET;
}
switch ($_POST["processingtype"]) {
  case 'newvoedselpakket':
    newvoedselpakket();
    break;

  case 'markafgifte':
    markafgifte();
    break;

  case 'addproduct':
    addproduct();
    break;
  
  default:
    # code...
    break;
}


function newvoedselpakket(){
  include("database/dhb.php");

  $klantFID = $_POST["klantid"];
  $curdate = date("Y-m-d");

  echo("<p>$klantFID</p>");
  print_r($curdate);

  $stmt = $dhb->prepare("INSERT INTO  voedselpakket (
    KlantFID, 
    DatumCreatie
    )
  VALUES (
  :KlantFID,
  :DatumCreatie
  )"
  );
  $stmt->bindParam(':KlantFID', $klantFID);
  $stmt->bindParam(':DatumCreatie', $curdate);
  $stmt->execute();

  header("location: voedselpakketten.php?displaytype=addtovoedselpakket");

}

function markafgifte(){
  include("database/dhb.php");

  $voedselpakketid = $_POST["voedselpakketid"];
  $query = ("UPDATE voedselpakket SET DatumUitgifte = curdate() WHERE VoedselpakketID = $voedselpakketid");
  $dhb -> query($query);

  header("location: voedselpakketten.php");
}

function addproduct(){
  include("database/dhb.php");

  $productID = $_POST["productID"];
  $voedselpakketID = $_POST["voedselpakketID"]; 

  $query = "SELECT count(*) FROM voedselpakket_has_product WHERE Product_ProductID = $productID AND Voedselpakket_VoedselpakketID = $voedselpakketID";
  $count = $dhb -> query($query) -> fetch(PDO::FETCH_NUM)[0];



  if($count == 0){
    //create new voedselpakket_has_product
    $query = "INSERT INTO voedselpakket_has_product (Voedselpakket_VoedselpakketID, Product_ProductID, Aantal) VALUES ($voedselpakketID, $productID, 1) ";

    $dhb -> query($query);
  }else{
    //add 1 to voedselpakket_has_product
    $query = "UPDATE voedselpakket_has_product SET Aantal = Aantal+1 WHERE Product_ProductID = $productID AND Voedselpakket_VoedselpakketID = $voedselpakketID";
    $dhb -> query($query);
  }
  $query = "UPDATE Product SET Aantal = Aantal-1 WHERE ProductID = $productID";
  $dhb -> query($query);

  header("location: voedselpakketten.php?displaytype=addToVoedselpakket&voedselpakketid=$voedselpakketID");


  exit;
}