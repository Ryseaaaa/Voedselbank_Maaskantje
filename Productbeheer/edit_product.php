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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productID = $_POST["ProductID"];
    $productName = $_POST["ProductNaam"];
    $amount = $_POST["Aantal"];

    $sql = "UPDATE product SET ProductNaam='$productName', Aantal='$amount' WHERE ProductID='$productID'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();

header("Location: ../magazijn.php"); // Redirect naar magazijn.php, change is gelijk te zien
exit();
?>
