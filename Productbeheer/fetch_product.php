<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "voedselbank maaskantje";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sort = isset($_GET['sort']) ? $_GET['sort'] : 'none';
$sortBy = ""; // Default sort is empty

// Categories array
$categories = [
    1 => 'AGF',
    2 => 'Kaas, Vleeswaren',
    3 => 'Zuivel, plantaardig en eieren',
    4 => 'Bakkerij en banket',
    5 => 'Frisdrank, sappen, koffie en thee',
    6 => 'Pasta, rijst en wereldkeuken',
    7 => 'Soepen, sauzen, kruiden, olie',
    8 => 'Snoep, koek, chips en chocolade',
    9 => 'Baby, verzorging en hygiëne'
];

foreach ($categories as $id => $name) {
    echo "<div class='category-box'>";
    echo "<h3>Categorie $id ($name)</h3>";
    echo "<select class='form-control sort-dropdown' data-category='$id'>
            <option value='none'>Sort</option>
            <option value='name'>Sort by Name</option>
            <option value='amount'>Sort by Amount</option>
            <option value='ean'>Sort by EAN Code</option>
          </select>";
    echo "<ul id='category-$id'>";

    switch ($sort) {
        case 'name':
            $sortBy = "ProductNaam";
            break;
        case 'amount':
            $sortBy = "CAST(Aantal AS UNSIGNED)";
            break;
        case 'ean':
            $sortBy = "ProductID";
            break;
        default:
            $sortBy = ""; // Default = no sort
            break;
    }

    $sql = "SELECT ProductNaam, Aantal, ProductID FROM product WHERE CatogorieFID=$id";
    if ($sortBy != "") {
        $sql .= " ORDER BY $sortBy";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row["ProductNaam"] . ": " . $row["Aantal"] . " (EAN: " . $row["ProductID"] . ")</li>";
        }
    } else {
        echo "<li>No products found</li>";
    }
    
    echo "</ul></div>";
}

$conn->close();
?>
