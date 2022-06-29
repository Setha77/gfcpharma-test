<?php
include_once "../includes/functions.inc.php";
include_once "../includes/parties.inc.php";


    if(isset($_GET["reset"])) {
        if(htmlspecialchars($_GET["reset"]== "sent")) {
            function_alert("Veuillez regarder votre boîte mail");
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../content/mdp.css" />
    <script src="https://kit.fontawesome.com/1d2e5bc245.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
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
            <h2>Mot de passe oublié</h2>
            <form action="../includes/reset-request.inc.php" method ="post">
            <input type="text" class="field" name = "email" placeholder="Email ">
            <button class="btn" type="submit" name="reset-request-submit">Envoyer la demande de réinitialisation</button>
            </form>
        </div>
    </div>
</body>

</html>