<?php
//include("../database/dhb.php");

session_start();
session_unset();

print_r($_POST);

$user = "root";
$pass = "";

try {
    include("./database/dhb.php");
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

    $OMG = $dhb->prepare("SELECT * FROM user WHERE Username = :username");
    $OMG->bindParam(":username", $_POST["username"]);
    $OMG->execute();
//$OMG = $pdo->query("SELECT * FROM user WHERE username = \"".$_POST["username"]."\"");
// $OMG = $pdo->query("SELECT * FROM user");
    $ResultI = $OMG->fetchAll(PDO::FETCH_ASSOC);

    print_r($ResultI);
    //exit();

    if(isset($ResultI[0]) && $ResultI[0]["Password"] == $_POST["pass"]) {
        $_SESSION["user"] = $_POST["username"];
        $_SESSION["pass"] = $_POST["pass"];
        $_SESSION["role"] = $ResultI[0]["Role"];
        $_SESSION["loggedIn"] = true;

        print_r($_SESSION["role"]);
        header("Location: ./index.php");
    } else {
        //header("Location:".$_SERVER["HTTP_REFERER"]);
        $_SESSION["error"] = "Login gegevens incorrect";
        header("Location: TestInlog.php");
    }