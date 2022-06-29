<?php
include_once "../includes/parties.inc.php";
include_once "../includes/functions.inc.php";
session_start();
timeout();

if(isset($_GET["error"])) {
    if(htmlspecialchars($_GET["error"]== "emptyinput")) {
        function_alert('Certains champs ne sont pas remplis'); 
    }
    if(htmlspecialchars($_GET["error"]== "unknownerror") || htmlspecialchars($_GET["error"]== "usernotfound")) {
        function_alert('Erreur inconnue, veuillez contacter un administrateur');    
    }
    if(htmlspecialchars($_GET["error"]== "different")) {
        function_alert('Les mots de passe ne correspondent pas.'); 
    }
    if(htmlspecialchars($_GET["error"]== "wrongpassword")) {
        function_alert('Mot de passe incorrect.'); 
    }
    if(htmlspecialchars($_GET["error"]== "none")) {
        function_alert('Informations modifiées.'); 
    }
    if(htmlspecialchars($_GET["error"]== "invalidemail")) {
        function_alert('Email non conforme ou déjà utilisé.'); 
    }
    if(htmlspecialchars($_GET["error"]== "invalidtel")) {
        function_alert('Numéro de téléphone non conforme ou déjà utilisé.'); 
    }
    if(htmlspecialchars($_GET["error"]== "userdoesnotexist")) {
        function_alert('Unexpected Error.'); 
    }
    if(htmlspecialchars($_GET["error"]== "invalidadress")) {
        function_alert("Création de compte impossible, veuillez retirer les caractères spéciaux dans le champs Adresse : /[\'^£$%&*()}{@#~?><>,|=_+¬-]/ "); 
    }
}
if(isset($_GET["reset"])) {    
    if(htmlspecialchars($_GET["reset"]== "success")) {
        function_alert('Mot de passe réinitialisé.'); 
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
    <title>Mes informations</title>
    <link rel="stylesheet" href="../content/mesInformations.css" />
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

            <div class="grid-container">
                <div class="grid-item grid-title">
                    <div class="title">
                        <h3>Modifier mes infos</h3>
                    </div>
                </div>
                <div class="grid-item grid-left">
                    <div class="left-title">
                        <h3>Mes infos</h3>
                    </div>
                    <form action="../includes/mesinformations.inc.php" method="post" class="user-details"  onsubmit="return confirm('Etes vous sûrs de vouloir continuer ?');">
                        <div class="input-box">
                            <span class="details">Nom</span>
                            <input type="text" name = "nom" required value ="<?php  echo $_SESSION["nom"] ;  ?>">
                        </div>
        
                        <div class="input-box">
                            <span class="details">Prénom</span>
                            <input type="text" name = "prenom" required value ="<?php  echo $_SESSION["prenom"] ;?>">
                        </div>
        
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="text" name = "email" required value ="<?php echo $_SESSION["email"] ;  ?>" >
                        </div>

                        <div class="input-box">
                            <span class="details">Adresse de la pharmacies</span>
                            <input type="text" name = "adresseP" required value ="<?php echo $_SESSION["adresseP"] ; ?>">
                        </div>

                        <div class="input-box">
                            <span class="details">Téléphone</span>
                            <input type="text" name = "telP" required value ="<?php  echo $_SESSION["telP"]; ?>">
                        </div>
                        <div class="description">
                            <h3>Description</h3>
                            <textarea class="textarea" rows="4" name = "description" cols="60" placeholder="Enter a message ..." ><?php echo $_SESSION["description"] ;?> </textarea>
                        </div>
                        <div class="button-left">
                            <input type="submit" name ="changemembre" placeholder="Modifier">
                        </div>
                    </form>
                </div>
                
                <div class="grid-item grid-right">
                    <div class="right-title">
                        <h3>Mon mot de passe</h3>
                    </div>
                    
                    <form action="../includes/mesinformations.inc.php?email=<?php echo $_SESSION["email"]?>" method = "post" class="user-passwords" onsubmit="return confirm('Etes vous sûrs de vouloir continuer ?');">
                        <div class="input-box">
                            <span class="details">Ancien mot de passe</span>
                            <input type="password" name = "oldmdp" placeholder="Ancien mot de passe" required>
                        </div>
        
                        <div class="input-box">
                            <span class="details">Nouveau mot de passe</span>
                            <input type="password" name = "newmdp" placeholder="Nouveau mot de passe" required>
                        </div>
            
                        <div class="input-box">
                            <span class="details">Confirmer mot de passe</span>
                            <input type="password" name = "newmdp2" placeholder="Confirmez" required>
                        </div>
        
                        <div class="button-right">
                            <input type="submit" name = "changepassword" placeholder="Modifier">
                        </div>
                    </form>
                        <div class="flex-item-right-bottom">
                            <h3>Modifier mon image</h3>
                                <form action="../includes/mesInformations.inc.php" method = "post" class="user-image" enctype="multipart/form-data">
                                    <div class="file-chooser">
                                        <input type="file" name="file" id="file" class="customFile">
                                    </div>
                                    <div class="button-image">
                                        <input type="submit" name = "changeimage" placeholder="Modifier">
                                    </div>
                                </form> 
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