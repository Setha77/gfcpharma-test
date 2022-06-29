<?php
include_once "../classes/vue/membre-vue.class.php";
include_once "../includes/functions.inc.php";
include_once "../includes/parties.inc.php";
session_start();
if(isset($_GET["email"])){
    $email = htmlspecialchars($_GET["email"]);

    $mv = new Membrevue();

    $infos = $mv->showMembre($email);
    
    
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit admin </title>
    <link rel="stylesheet" href="../content/editAdmin.css" />
    <script src="https://kit.fontawesome.com/1d2e5bc245.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
</head>

<body>
    <header>
        <?php 

        afficheNav($navAdmin, $navMembre, $nav)

        ?>
    </header>

    <main class="tbd-content">
        <div class="sidebar">
            <a href="#" class="brand">
                <i class="fa-solid fa-hammer"></i>
                <h1> Administration</h1>
            </a>

            <center class="top">
                <h3> <?php echo $_SESSION["prenom"].' '.$_SESSION["nom"];?></h3>
            </center>
            
            <ul>
                <li>
                    <a href="tdb.php">
                        <i class="fa-solid fa-border-all tdb-img"></i>
                        <span> Tableau de bord</span>
                    </a>
                </li>
                <li>
                    <a href="gestionmembre.php">
                        <i class="fa-solid fa-user"></i>
                        <span>Gestion des Membres</span>
                    </a>
                </li>
                <li>
                    <a href="ajoutmembre.php">
                        <i class="fa-solid fa-user-plus"></i>
                        <span>Ajouter un Membre</span>
                    </a>
                </li>
                <li>
                    <a href="gestionPartenaire.php">
                        <i class="fa-solid fa-user"></i>
                        <span>Gestion des Partenaires</span>
                    </a>
                </li>
                <li>
                    <a href="ajouterPartenaire.php">
                        <i class="fa-solid fa-user-plus"></i>
                        <span>Ajouter un Partenaire</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa-solid fa-envelope"></i>
                        <span>Gestion des Newsletter</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="container">

            <div class="title">Nouveau membres</div>
            <form class = "formulaire" action='../includes/editAdmin.inc.php?email=<?php echo $email;?>&tel=<?php echo $infos[0]["telP"] ;?>&file=<?php echo $infos[0]["fileid"] ;?>'  method = "POST" onsubmit="return confirm('Etes vous sûrs de vouloir continuer ?');">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Nom</span>
                        <input type="text" name = "nom" placeholder="Nom" value = "<?php echo $infos[0]["nom"] ;?>" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Prénom</span>
                        <input type="text" name = "prenom" placeholder="Prénom" value = "<?php echo $infos[0]["prenom"] ;?>" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" name = "email" placeholder="Email" value = "<?php echo $infos[0]["email"] ;?>" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Téléphone de la pharmacie</span>
                        <input type="text" name = "telP" placeholder="Téléphone pharmacie" value = "<?php echo $infos[0]["telP"] ;?>" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Adresse de la pharmacie</span>
                        <input type="text" name = "adresseP" placeholder="Adresse de la pharmacie" value = "<?php echo $infos[0]["adresseP"] ;?>" required>
                    </div>

                    <div class="answer">
                        <input type="radio" name="affirmation" id="dot-1" value="Yes">
                        <input type="radio" name="affirmation" id="dot-2" value="No" checked="checked">
                        <span class="question">Est il Admin ?</span>
                        <div class="yes-no">
                            <label for="dot-1">
                                <span class="dot one"></span>
                                <span class="affirmation">Oui</span>
                            </label>
                            <label for="dot-2">
                                <span class="dot two"></span>
                                <span class="affirmation">Non</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="answer">
                        <input type="radio" name="affirmation2" id="dot-3" value="Yes" checked="checked">
                        <input type="radio" name="affirmation2" id="dot-4" value="No">
                        <span class="question">Est il Actif ?</span>
                        <div class="yes-no">
                            <label for="dot-3">
                                <span class="dot three"></span>
                                <span class="affirmation1">Oui</span>
                            </label>
                            <label for="dot-4">
                                <span class="dot four"></span>
                                <span class="affirmation1">Non</span>
                            </label>
                        </div>
                    </div>

                    <div class="description">
                        <h3>Description</h3>
                        <textarea class="textarea" rows="10" name = "description" cols="50" placeholder="Enter a message ..." ><?php echo $infos[0]["description"] ;?> </textarea>
                    </div>
                    <div class="button">
                        <input type="submit" name = "editMembre" placeholder="Créer">
                    </div>
                </div>
            </form>

        </div>
        

    </main>


    <?php 

        echo $footer;

    ?>
</body>

</html>