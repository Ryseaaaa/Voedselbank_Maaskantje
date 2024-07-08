<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--  <meta charset="UTF-8">-->
<!--  <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--  <title>Account</title>-->
<!--  --><?php //include("common/styles.php"); ?>
<!--</head>-->
<!--<body>-->
<!--  --><?php //
//  session_start();
//
//  include("common/navbar.php");
//
//  print_r($_POST);
//
//try {
//    include("database/dhb.php");
//
//    $OMG = $dhb->prepare("SELECT * FROM user WHERE username = :username");
//    $OMG->bindParam(":username", $_POST["username"]);
//    $OMG->execute();
//
//    $ResultI = $OMG->fetchAll(PDO::FETCH_ASSOC);
//
//    if(isset($ResultI[0]) && $ResultI[0]["pass"] == $_POST["pass"]) {
//        $_SESSION["user"] = $_POST["username"];
//
//        header("Location:./index.php");
//    } else {
//        header("Location:".$_SERVER["HTTP_REFERER"]);
//    }
//} catch(PDOException $e) {
//    echo "Connection failed: " . $e->getMessage();
//}
//
//
//
//
//  //POST login
//  if(isset($_POST["submit"]) && $_POST["submit"] == "Login"){
//    $username = "user";
//    $password = "pass";
//
//    if($_POST["username"] == $username && $_POST["password"] == $password ){
//      $_SESSION["username"] = $username;
//      $_SESSION["password"] = $password;
//      $_SESSION["loggedIn"] = true;
//    }else{
//      session_destroy();
//      header("location:account.php");
//      exit();
//    }
//
//    //when logging in
//
//  }
//
//  if((isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) != true){
//    session_unset();
//    session_destroy();
//    include("login/loginform.php");
//  }else{
//    include("login/account.php");
//  }
//
//
//
//
//
//
//
//
//
//  ?>
<!--  <div>login</div>-->
<!--  -->
<!--</body>-->
<!--</html>-->