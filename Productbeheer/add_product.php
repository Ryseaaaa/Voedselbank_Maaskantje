<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "voedselbank maaskantje";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productID = $_POST['ProductID'];
    $productName = $_POST['ProductNaam'];
    $amount = $_POST['Aantal'];
    $categoryFID = $_POST['CatogorieFID'];

    // Check if product already exists
    $checkSql = "SELECT * FROM Product WHERE ProductID = ?";
    if ($stmt = $conn->prepare($checkSql)) {
        $stmt->bind_param("s", $productID);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            // Product already exists
            $stmt->close();
            echo "<script>alert('Product bestaat al'); window.location.href='../magazijn.php';</script>";
            exit();
        }
        $stmt->close();
    }

    // Product does not exist, proceed with insertion
    $sql = "INSERT INTO Product (ProductID, ProductNaam, Aantal, CatogorieFID) VALUES (?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssii", $productID, $productName, $amount, $categoryFID);
        if ($stmt->execute()) {
            header("Location: ../magazijn.php");
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    header("Location: ../magazijn.php");
}
?>
