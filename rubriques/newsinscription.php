
<?php
include_once "../includes/parties.inc.php";
include_once "../includes/functions.inc.php";
session_start();

    if(isset($_SESSION["id"])) {
        timeout();
        
    }
    if(isset($_GET["error"])) {
        if(htmlspecialchars($_GET["error"]== "email")) {
           
            function_alert("Email invalide");
        }
        if(htmlspecialchars($_GET["error"]== "useroremailtaken")) {
           
            function_alert("Cet email est déjà utilisé");
        }
        if(htmlspecialchars($_GET["error"]== "emptyinput")) {
           
            function_alert("Vous n'avez pas remplis le champs.");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../content/news.css" />
    <title>Inscription Newsletter</title>
</head>
<body>
    <header>
        <?php 

        afficheNav($navAdmin, $navMembre, $nav)

        
        ?>
    </header>
    <main class="main-content">
        <div class="connect-container">
            <div class="connect-box">
                <div class="box"></div>
                <h2>S'inscrire à nos newsletter</h2>
                <form action="../includes/follow.inc.php" method= "POST">
                    <input type="text" name="email" class="field" placeholder="Email ">
                    <button type="submit" name="follow" class="btn">S'inscrire</button>
                </form>
            </div>
        </div>
    </main>

    <header>
        <?php 

        echo $footer;

        ?>
    </header>
</body>
</html>