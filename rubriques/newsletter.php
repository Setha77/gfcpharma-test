<?php
include_once "../includes/parties.inc.php";
include_once "../includes/functions.inc.php";
session_start();
timeout();


if(isset($_GET["error"])) {
    if(htmlspecialchars($_GET["error"]== "emptyinput")) {
        function_alert('Certains champs ne sont pas remplis'); 
    }
    if(htmlspecialchars($_GET["error"]== "titretaken")) {
        function_alert('Ce titre déjà utilisée');    
    }
    if(htmlspecialchars($_GET["error"]== "option")) {
        function_alert('Aucun option choisie'); 
    }
    if(htmlspecialchars($_GET["error"]== "none")) {
        function_alert('Newsletter en attente de validation par un administrateur'); 
    }
    if(htmlspecialchars($_GET["error"]== "filetoobig")) {
        function_alert('Le fichier image est trop lourd.'); 
    }
    if(htmlspecialchars($_GET["error"]== "unknown")) {
        function_alert('Erreur inconnu'); 
    }
    if(htmlspecialchars($_GET["error"]== "invalidtype")) {
        function_alert('Type de fichier non valide.'); 
    }
}

if($_SESSION["image"]==null){
    $img="images/6h-1_0.jpeg";
}else{
    $img='profile/'.$_SESSION["image"];
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter</title>
    <link rel="stylesheet" href="../content/newsletter.css" />
    <script src="https://kit.fontawesome.com/1d2e5bc245.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
</head>

<body>
    <header>
        <?php 

        afficheNav($navAdmin, $navMembre, $nav)

        ?>
    </header>
    <main class="main-content">
        <div class="sidebar">
            <center class="top">
                <img src="../content/<?php echo $img;?>" class="img-profile" alt="">
                <h3> <?php echo $_SESSION["prenom"].' '.$_SESSION["nom"];?></h3>


            </center>
            <ul>
                <li>
                    <a href="tdb.php">
                        <i class="fa-solid fa-border-all tdb-img"></i>
                        <span class=""> Tableau de bord</span>
                    </a>
                </li>
                <li>
                    <a href="mesInformations.php">
                        <i class="fa-solid fa-circle-info"></i>
                        <span>Mes Informations</span>
                    </a>
                </li>
                <li>
                    <a href="newsletter.php">
                        <i class="fa-solid fa-envelope-circle-check"></i>
                        <span>Newsletter</span>
                    </a>
                </li>

            </ul>
        </div>

        <div class="body-container">
            <div class="body-box">
                <div class="body-top-left">
                    <div class="title-left">
                        <i class="fa-solid fa-circle-user"></i>
                        <h3>Mes informations</h3>
                    </div>

                    <p>Modifier mes informations, changer de mot de passe ...</p>
                    <div class="Go">
                        <a href="">
                            <span>Go</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                    </div>
                </div>
                <div class="body-top-right">
                    <div class="title-right">
                        <i class="fa-solid fa-envelope-circle-check"></i>
                        <h3>Newsletter</h3>
                    </div>

                    <p>S'abonner à des newsletter, créer des newsletter ... </p>
                    <div class="Go">
                        <a href="">
                            <span>Go</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="body-middle">
                <div class="body-content">
                    <div class="body-left-content">
                    <form action="../includes/newsletter.inc.php" method= "POST" enctype="multipart/form-data">
                        <div class="body-left-content-elem">
                            <h3>Créer une newsletter</h3>
                            <label for="Titre"> Titre</label>
                            <input type="text" class="field" placeholder="Titre" name="titre" id="Titre">
                            <label for="type-select"> Privé ou public</label>
                            <select name="type-news" id="type-select" class="field">
                            <option value="3">-- Choisissez une option --</option>
                            <option value="0">Privé</option>
                            <option value="1">Public</option>
                        </select>


                            <label for="Description"> Description</label>
                            <textarea class="field area" placeholder="Description" name="description" id="Description"></textarea>
                            

                            <div class="input-box">
                                <input type="file" name="file" >
                            </div>

                            <button class="btn-field" type="submit" name="createnews"> Créer</button>
                        </div>
                    </form>
                    </div>
                    <div class="body-right-content">
                        <div class="body-right-content-elem">
                            <h3>S'abonner aux Newsletter</h3>
                        <form action="../includes/follow.inc.php" method= "POST">
                            <label for="email">Email</label>
                            <input type="text" name = "email" class="field" placeholder="Entrez votre email" id="email" required>
                            <button class="btn-field" type="submit" name="follow"> S'abonner</button>
                        </form>
                        </div>
                    </div>
                </div>

            </div>

    </main>
    <?php
            echo $footer;
    ?>

</html>