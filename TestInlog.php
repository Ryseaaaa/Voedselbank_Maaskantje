<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
</head>
<body>
        <?php
                session_start();
                include("common/navbar.php");
                include("common/styles.php");
                if (!isset($_SESSION["loggedIn"])) { $_SESSION["loggedIn"] = false;}

                if( $_SESSION["loggedIn"] != true){
                        include("login/loginform.php");
                }else{
                        //check if login is correct
                        include("login/loginvalidation.php");

                        //check for get request
                        if(!isset($_GET["display"])){
                                //if no display type, set to default
                                $_GET["display"] = "default";
                        }

                        //switch for display type
                        switch ($_GET["display"]) {
                                case 'changepassword':
                                        include("login/changepassword.php");
                                        break;

                                case 'logout':
                                        session_unset();
                                        session_destroy();
                                        header("location: TestInlog.php");
                                        break;
                                
                                default:
                                        include("login/account.php");
                                        break;
                        }
                        
                }
        ?>
        
</body>
</html>

