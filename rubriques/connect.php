<?php
include_once "../includes/functions.inc.php";
include_once "../includes/parties.inc.php";


if(isset($_GET["error"])) {
    if(htmlspecialchars($_GET["error"]== "emptyinput")) {
        function_alert('Certains champs ne sont pas remplis'); 
    }
    if(htmlspecialchars($_GET["error"]== "wrongpassword")||htmlspecialchars($_GET["error"]== "usernotfound")) {
        function_alert('Certaines informations sont incorrectes');    
    }
    if(htmlspecialchars($_GET["error"]== "inactif")) {
        function_alert('Votre compte est inactif, veuillez contacter un administrateur pour changer cela.');    
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1d2e5bc245.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="../content/connect.css" />
    <title>Se Connecter</title>
</head>

<body>
    <header>
        <?php 

        afficheNav($navAdmin, $navMembre, $nav)

        ?>
    </header>

    <div class="connect-container">
        <div class="connect-box">
            <div class="box"></div>
            <h2>Se connecter</h2>
            <form action="../includes/login.inc.php" method="POST">
                <input type="text" class="field" name = "email" placeholder="Email ">
                <input type="password" class="field" name = "mdp" placeholder="Mot de passe  ">
                <button class="btn" type="submit" name="connexion">Connexion</button>
            </form>
            <a href="mdp.php">Mot de passe oublié ?</a>
        </div>
    </div>
</body>

</html>