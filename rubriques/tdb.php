<?php
include_once "../includes/parties.inc.php";
include_once "../includes/functions.inc.php";
session_start();
timeout();

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
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="../content/tdb.css" />
    <script src="https://kit.fontawesome.com/1d2e5bc245.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
</head>


<body>
    <header>
        <?php 

        afficheNav($navAdmin, $navMembre, $nav);
        

        ?>
    </header>
    <main class="tbd-content">

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
                        <a href="mesInformations.php">
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
                        <a href="newsletter.php">
                            <span>Go</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>
            <div class="body-middle">
                <div class="top-middle">
                    <div class="top-mid-title">
                        <h3>Mon Compte</h3>
                    </div>


                    <div class="top-middle-cont">
                        <div class="top-middle-left">
                            <h4>Informations</h4>
                            <span class="NomPrenom"> <?php echo $_SESSION["nom"].' '.$_SESSION["prenom"]?> </span>
                            <span class="Email"><?php echo $_SESSION["email"] ?></span>
                            <a href="mesInformations.php" class="edit"> Modifier </a>

                        </div>
                    </div>

                </div>
                <div class="bot-middle">
                    <div class="top-bot-title">
                        <h3>Mon Adresse</h3>
                    </div>

                    <div class="bot-middle-cont">
                        <div class="bot-middle-left">
                            <h4>Adresse et Télephone Pharmacie</h4>
                            <span class="Adresse"> <?php echo $_SESSION["adresseP"] ?></span>
                            <span class="Télephone"> <?php echo $_SESSION["telP"] ?></span>
                            <a href="mesInformations.php" class="edit"> Modifier </a>

                        </div>


                    </div>

                </div>

            </div>
    </main>
        <?php
            echo $footer;
        ?>
</body>

</html>