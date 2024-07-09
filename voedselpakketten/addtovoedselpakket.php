<?php
  $voedselpakketid = $_GET["voedselpakketid"];
  include("database/dhb.php");

  //Get products in this voedselpakket
  $query = "SELECT ProductID, ProductNaam, voedselpakket_has_product.aantal FROM voedselpakket_has_product
  LEFT JOIN product ON product_productID = productID
  WHERE voedselpakket_voedselpakketID = $voedselpakketid;";
  $currentproducts = $dhb -> query($query) -> fetchAll(PDO::FETCH_ASSOC);

  //Get Available products
  $query = "SELECT ProductID, ProductNaam, Aantal FROM Product WHERE Aantal > 0";
  $availableproducts = $dhb -> query($query) -> fetchAll(PDO::FETCH_ASSOC);

  //Get current klant info
  $query = "SELECT GezinsNaam, AantalVolwassenen, AantalKinderen, AantalBabys, ExtraInformatie
  FROM klant WHERE KlantID = (
    SELECT KlantFID FROM voedselpakket WHERE voedselpakketID = $voedselpakketid 
    )";
  $klantinfo = $dhb -> query($query) -> fetch(PDO::FETCH_ASSOC);
  
  echo "<p>Gezins Naam: ".$klantinfo["GezinsNaam"]."</p>";
  echo "<p>Aantal Volwassenen: ".$klantinfo["AantalVolwassenen"]."</p>";
  echo "<p>Aantal Kinderen: ".$klantinfo["AantalKinderen"]."</p>";
  echo "<p>Aantal Babys: ".$klantinfo["AantalBabys"]."</p>";
  if($klantinfo["ExtraInformatie"] != ""){
    echo "<p>Extra Informatie: ".$klantinfo["ExtraInformatie"]."</p>";
  }

  ?>
  <!-- Products in Voedselpakket table -->
  <table>
    <tr>
      <th>Product EAN</th>
      <th>Product naam</th>
      <th>Aantal</th>
      <th>Verwijderen</th>
    </tr>
    <?php
      foreach ($currentproducts as $product) {
        echo "<tr>";
        foreach ($product as $key => $value) {
          echo "<td>$value</td>";
        }
        echo "
        <td>
          <form action=\"voedselpakketten.php?displaytype=processing\" method=\"POST\">
            <input type=\"hidden\" name=\"voedselpakketID\" value=\"$voedselpakketid\">
            <input type=\"hidden\" name=\"productID\" value=\"".$product["ProductID"]."\">
            <input type=\"hidden\" name=\"processingtype\" value=\"removeproduct\">
            <input type=\"submit\" value=\"-\">
          </form>
        </td>";
        echo "</tr>";
      }
    ?>
  </table>
    <!-- Products in Voedselpakket table -->


  <!-- Add product to voedselpakket -->
  <form action="voedselpakketten.php?displaytype=processing" method="POST">
  <input type="hidden" name="voedselpakketID" value="<?php echo($voedselpakketid); ?>">
  <input type="hidden" name="processingtype" value="addproduct">
  Voeg product toe:
  <select name="productID">
    <?php
    //determine if this is the previously added product

    
    foreach ($availableproducts as $index => $product) {
      $previousproduct = false;
      if (isset($product["ProductID"])) {
        if ($product["ProductID"] == $_SESSION["productID"]) {
          $previousproduct = true;
        }
      }
      
      echo "<option ";
      if ($previousproduct) echo "selected "; //select the same product that was previously added
      echo "value=".$product["ProductID"].">".$product["ProductNaam"]." (".$product["Aantal"].")</option>";
    }
    ?>
  </select>
  <input type="submit" value="Voeg Toe">
</form>