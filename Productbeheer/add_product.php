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
    $catogoryFID = $_POST['CatogorieFID'];

    $sql = "INSERT INTO product (ProductID, ProductNaam, Aantal, CatogorieFID) VALUES (?, ?, ?, ?)";

    // Prepare and bind
    if ($stmt = $conn->prepare($sql)) {
        // "i" stands for integer, "s" stands for string
        $stmt->bind_param("issi", $productID, $productName, $amount, $catogoryFID);

        // Execute statement
        if ($stmt->execute()) {
            // Redirect to the page with the form
            header("Location: ../magazijn.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    // If the request method is not POST, redirect to the form page
    header("Location: ../magazijn.php");
}
?>