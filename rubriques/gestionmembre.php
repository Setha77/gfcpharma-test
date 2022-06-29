<?php
include_once "../includes/affichetab.inc.php";
include_once "../includes/parties.inc.php";
include_once "../includes/functions.inc.php";
include_once '../classes/vue/membre-vue.class.php';

session_start();
timeout();
if(isset($_GET["error"])){
        if(htmlspecialchars($_GET["error"]== "emptyinput")) {
            function_alert('Certains champs ne sont pas remplis.'); 
        }    
        if(htmlspecialchars($_GET["error"]== "invalidemail")) {
            function_alert('Email non conforme ou déjà utilisé.'); 
        }
        if(htmlspecialchars($_GET["error"]== "invalidtel")) {
            function_alert('Numéro de téléphone non conforme ou déjà utilisé.'); 
        }
        if(htmlspecialchars($_GET["error"]== "none")) {
            function_alert('Informations modifiées.'); 
        }
        if(htmlspecialchars($_GET["error"]== "userdoesnotexist")) {
            function_alert('Unexpected Error.'); 
        }
        if(htmlspecialchars($_GET["error"]== "invalidadress")) {
            function_alert("veuillez retirer les caractères spéciaux dans le champs Adresse : /[\'^£$%&*()}{@#~?><>,|=_+¬-]/ "); 
        }

    }
if(isset($_GET["delete"])){

    if(htmlspecialchars($_GET["delete"]== "success")) {
        function_alert('Le Compte a été supprimé.'); 
    }    
    if(htmlspecialchars($_GET["delete"]== "impossible")) {
        function_alert('Vous ne pouvez pas supprimer votre propre compte.'); 
    }
    if(htmlspecialchars($_GET["delete"]== "unauthorized")) {
        function_alert('Vous ne possédez pas les droits pour effectuer cela.'); 
    }

}

$mv = new Membrevue();

$membres = $mv->showMembres();

foreach ($membres as &$value) {
    unset($value["id"]);
    unset($value["mdp"]);
    unset($value["telP"]);
    unset($value["isActif"]);
    unset($value["isAdmin"]);
    unset($value["image"]);
    unset($value["fileid"]);
    unset($value["description"]);
    unset($value["adresseP"]);
}

?> 
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel </title>
    <link rel="stylesheet" href="../content/gestion.css" />
    <script src="https://kit.fontawesome.com/1d2e5bc245.js" crossorigin="anonymous"></script>
    <script src="../scripts/app.js"> </script>
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
                            <i class="fa-solid fa-user"></i>
                            <span>Ajouter un Patenaire</span>
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
        <div class="table">
            <div class="table-header">
                <p>Liste des membres</p>


              
                <input type="search" id="search" name="search" placeholder="Entrez un nom">
                <button class="search" onclick = 'search(<?php echo json_encode($membres); ?>,document.getElementById("search").value)'> Rechercher</button>
            </div>
            <div class="table-title">
                <table id= "table">
                    <thead id="table-head">
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>Rôle</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody class="table-content">
                        <?php affichetab() ?>

                    </tbody>
                </table>
            </div>
        </div>
    </main>


</body>

</html>