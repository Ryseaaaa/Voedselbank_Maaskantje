<?php
  $voedselpakketid = $_GET["voedselpakketid"];
  include("database/dhb.php");

  $query = "SELECT ProductNaam, voedselpakket_has_product.aantal FROM voedselpakket_has_product
  LEFT JOIN product ON product_productID = productID
  WHERE voedselpakket_voedselpakketID = $voedselpakketid;";
  
  $currentproducts = $dhb -> query($query) -> fetchAll(PDO::FETCH_NUM);

  $query = "SELECT ProductID, ProductNaam, Aantal FROM Product WHERE Aantal > 0";

  $availableproducts = $dhb -> query($query) -> fetchAll(PDO::FETCH_ASSOC);



  ?>
  <table>
    <tr>
      <th>Product naam</th>
      <th>Product Aantal</th>
    </tr>
    <?php
      foreach ($currentproducts as $product) {
        echo "<tr>";
        foreach ($product as $key => $value) {
          echo "<td>$value</td>";
        }
        echo "</tr>";
      }
      

    ?>
    
  </table>

  <form action="voedselpakketten.php?displaytype=processing" method="POST">
  <input type="hidden" name="voedselpakketID" value="<?php echo($voedselpakketid); ?>">
  <input type="hidden" name="processingtype" value="addproduct">
  Voeg product toe:
  <select name="productID">
    <?php
    foreach ($availableproducts as $index => $product) {
      echo "<option value=".$product["ProductID"].">".$product["ProductNaam"]." (".$product["Aantal"].")</option>";
    }
    ?>
  </select>
  <input type="submit" value="Voeg Toe">
</form>