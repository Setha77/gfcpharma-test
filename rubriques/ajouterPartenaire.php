<?php
include_once "../includes/parties.inc.php";
include_once "../includes/functions.inc.php";
session_start();
timeout();

if(isset($_GET["error"])) {
    if(htmlspecialchars($_GET["error"]== "emptyinput")) {
        function_alert('Certains champs ne sont pas remplis'); 
    }
    if(htmlspecialchars($_GET["error"]== "none")) {
        function_alert('Le Partenaire a été créé.'); 
    }
    if(htmlspecialchars($_GET["error"]== "filetoobig")) {
        function_alert('Le fichier est trop gros.'); 
    }
    if(htmlspecialchars($_GET["error"]== "unknown")) {
        function_alert('Erreur inconnue.'); 
    }
    if(htmlspecialchars($_GET["error"]== "invalidtype")) {
        function_alert('Fichier non valide.'); 
    }
    if(htmlspecialchars($_GET["error"]== "laboNametaken")) {
        function_alert('Ce Partenaire existe déjà.'); 
    }
    if(htmlspecialchars($_GET["error"]== "emptyinput")) {
        function_alert('Il faut remplir le champs du nom.'); 
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
                            <span>Ajouter un partenaire</span>
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
        <div class="title">Nouveau partenaire</div>
        <form action="../includes/labo.inc.php" method="POST" enctype="multipart/form-data">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Nom</span>
                    <input type="text" name = "nom" placeholder="Nom" required>
                </div>
      
                <div class="input-box">
                <span class="details">Image</span>
                    <input type="file" name="file" >
                </div>
                <div class="button">
                    <input type="submit" name="ajoutlabo" placeholder="Créer">
                </div>
            </div>
        </form>

    </main>


    <?php
        echo $footer;
    ?>
</body>

</html>