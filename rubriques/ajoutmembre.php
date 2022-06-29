<?php
include_once "../includes/parties.inc.php";
include_once "../includes/functions.inc.php";
session_start();
timeout();

if(isset($_GET["error"])) {
    if(htmlspecialchars($_GET["error"]== "emptyinput")) {
        function_alert('Certains champs ne sont pas remplis'); 
    }
    if(htmlspecialchars($_GET["error"]== "emailtaken")) {
        function_alert('adresse mail déjà utilisée');    
    }
    if(htmlspecialchars($_GET["error"]== "email")) {
        function_alert('email invalide'); 
    }
    if(htmlspecialchars($_GET["error"]== "invalidtel")) {
        function_alert('numero de telephone invalide, veuillez retirer les espaces et ne pas écrire sous la forme +33 ...'); 
    }
    if(htmlspecialchars($_GET["error"]== "userteltaken")) {
        function_alert('numero de telephone utilisé'); 
    }
    if(htmlspecialchars($_GET["error"]== "invalidadress")) {
        function_alert("Création de compte impossible, veuillez retirer les caractères spéciaux dans le champs Adresse : /[\'^£$%&*()}{@#~?><>,|=_+¬-]/ "); 
    }
    if(htmlspecialchars($_GET["error"]== "none")) {
        function_alert('Le Compte a été créé.'); 
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel </title>
    <link rel="stylesheet" href="../content/ajouterMembre.css" />
    <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=m0ovijXQTW6fnMdnNAaGLpgUkhWaXFvaXDOOMuLrM3UVJTTOWNLQXNUfjxE8s6cgBgk6O4qx9_nrGCPW2hk5Y7CplyQVOBHx_kWqMdg3USkSI0zbMgdm0-Nd8EJTQXAoYOJRk9jyy65bIXKe9vMBFmR0RKYe29KA1t_iZ0aPSiI" charset="UTF-8"></script><script src="https://kit.fontawesome.com/1d2e5bc245.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
</head>

<body>
    <header>
        <?php 

        afficheNav($navAdmin, $navMembre, $nav)

        ?>
    </header>

    <main class="gestion-content">
        <section>
            <div class="sidebar">
                <a href="#" class="brand">
                    <i class="fa-solid fa-hammer"></i>
                    <h1> Administration</h1>
                </a>
                <ul>
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
                        <a href="gestionnews.php">
                            <i class="fa-solid fa-envelope"></i>
                            <span>Gestion des Newsletter</span>
                        </a>
                    </li>
                    <li>
                        <a href="historique.php">
                            <i class="fa-solid fa-envelope"></i>
                            <span>Historique</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="container">
                <div class="header">
                    <div class="nav">

                    </div>
                </div>
            </div>
        </section>

        <div class="container">
        <div class="title">Nouveau membre</div>
        <form action="../includes/membre.inc.php" method="POST">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Nom</span>
                    <input type="text" name = "nom" placeholder="Nom" required>
                </div>

                <div class="input-box">
                    <span class="details">Prénom</span>
                    <input type="text" name = "prenom" placeholder="Prénom" required>
                </div>

                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" name = "email" placeholder="Email" required>
                </div>

                <div class="input-box">
                    <span class="details">Téléphone de la pharmacie</span>
                    <input type="text" name = "telP" placeholder="Téléphone pharmacie" required>
                </div>

                <div class="input-box">
                    <span class="details">Adresse de la pharmacie</span>
                    <input type="text" name = "adresseP" placeholder="Adresse de la pharmacie" required>
                </div>

                <div class="button">
                    <input type="submit" name="ajoutmembre" placeholder="Créer">
                </div>
            </div>
        </form>

    </main>


    <?php
        echo $footer;
    ?>
</body>

</html>