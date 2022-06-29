<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau mot de passe</title>
    <link rel="stylesheet" href="../content/newmdp.css" />
    
</head>
<body>
    <nav>
        <a href="accueil.html" class="logo"><img src="img/Logo-GFC-Pharma.jpg" width="100" height="70"></a>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa-solid fa-bars bars"></i>
        </label>

        <ul class="menu">
            <li> <a href="accueil.html">ACCUEIL</a></li>
            <li> <a href="contact.html">CONTACT</a></li>
            <li> <a href="gfc.html">GFC PHARMA</a></li>
            <li> <a href="" class="aaa">ESPACE PHARMACIEN</a></li>
            <li> <a href="gestion.html" class="admin">ADMINISTRATION</a></li>
            <li> <a href="connect.html" class="btn">Se Déconnecter</a></li>
        </ul>
    </nav>
    <main class="main-content">
        <div class="connect-container">
            <div class="connect-box">
                <div class="box"></div>
                <h2>Changement de mot de passe</h2>

                <?php
                        $selector = htmlspecialchars($_GET["selector"]);
                        $validator = htmlspecialchars($_GET["validator"]);
   
                        if (empty($selector) || empty($validator)) {
                            echo "Could not validate your request!";
                        } else {
                            if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){

                            ?>

                            <form action = "../includes/reset-request.inc.php?selector=<?=$selector?>&validator=<?=$validator?>" method="post">
                            <input type="password" name="pwd" class="field" placeholder="Nouveau mot de passe ">
                            <input type="password" name="pwd-repeat" class="field" placeholder="Confirmez votre noveau mot de passe ">
                            <button class="btn"  type ="submit" name = "reset-password-submit">Modifier</button>
                            </form>


                                <?php
                        }
                    }

                ?>
            </div>
        </div>
    </main>

    <footer>

        <ul class="menu_footer">
            <li> <a href="index.php">ACCUEIL</a></li>
            <li> <a href="contact.html">CONTACT</a></li>
            <li> <a href="">GFC PHARMA</a></li>
            <li> <a href="">ESPACE PHARMACIEN</a></li>
            <li> <a href="">ADMINISTRATION</a></li>
        </ul>
    </footer>
</body>
</html>