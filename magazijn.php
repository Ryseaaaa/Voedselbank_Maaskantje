<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("common/styles.php")?>
    <title>Product Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<?php
    session_start();
    $currentPage = "magazijn";
    include("login/loginvalidation.php");
    include("common/navbar.php");
    include("common/header.php");
?>

<main>
    <div class="section-magazijn">
        <h1 class="inventory margin-right-md">Voorraad Beheer</h1><br>
        <button type="button" id="addProductButton" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">
            + Add Product
        </button>

        <!-- Modal Structure for Adding Product -->
        <div class="modal" id="addProductModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Product</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form action="Productbeheer/add_product.php" method="post">
                            <div class="form-group">
                                <label for="ProductID">EAN Code:</label>
                                <input type="text" class="form-control" id="ProductID" name="ProductID" required>
                            </div>
                            <div class="form-group">
                                <label for="ProductNaam">Product Naam:</label>
                                <input type="text" class="form-control" id="ProductNaam" name="ProductNaam" required>
                            </div>
                            <div class="form-group">
                                <label for="Aantal">Aantal:</label>
                                <input type="text" class="form-control" id="Aantal" name="Aantal" required>
                            </div>
                            <div class="form-group">
                                <label for="CatogorieFID">Categorie:</label>
                                <select class="form-control" id="CatogorieFID" name="CatogorieFID" required>
                                    <option value="1">Categorie 1 (AGF)</option>
                                    <option value="2">Categorie 2 (Kaas,Vleeswaren)</option>
                                    <option value="3">Categorie 3 (Zuivel,plantaardig en eieren)</option>
                                    <option value="4">Categorie 4 (Bakkerij en banket)</option>
                                    <option value="5">Categorie 5 (Frisdrank,sappen,koffie en thee)</option>
                                    <option value="6">Categorie 6 (Pasta, rijs en wereldkeuken)</option>
                                    <option value="7">Categorie 7 (Soepen,sauzen,kruiden, olie)</option>
                                    <option value="8">Categorie 8 (Snoep, koek, chips en chocolade)</option>
                                    <option value="9">Categorie 9 (Baby, verzorging en hygiëne)</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product List -->
        <div class="inventory">
            <h2>Current Products</h2>
            <div id="product-list">
                <?php include 'Productbeheer/fetch_product.php'; ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </section>
  </main>

    <!-- script voor sorteren -->
     <script>
      document.querySelectorAll('.sort-dropdown').forEach(dropdown => {
        dropdown.addEventListener('change', function() {
          const sortOption = this.value;
          const url = new URL(window.location.href);
          if (sortOption === 'none') {
            url.searchParams.delete('sort');
          } else {
          url.searchParams.set('sort', sortOption);
          }
          window.location.href = url.toString();
        });
      });
     </script>
</body>
</html>
