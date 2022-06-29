<?php

include_once "../includes/affichetab.inc.php";
include_once "../includes/parties.inc.php";
include_once "../includes/functions.inc.php";
include_once '../classes/vue/labo-vue.class.php';

session_start();
timeout();

if(isset($_GET["error"])){
    if(htmlspecialchars($_GET["error"]== "userdoesnotexist")) {
        function_alert('Il y eu une erreur.'); 
    }    
}
if(isset($_GET["delete"])){
    if(htmlspecialchars($_GET["delete"]== "success")) {
        function_alert('Partenaire retiré.'); 
    }    
}


$l = new Labovue();
$labos = $l->showLabos();

foreach ($labos as &$value) {
    unset($value["id"]);
    unset($value["logo"]);
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
        <div class="table">
            <div class="table-header">
                <p>Liste des partenaires</p>


              
                <input type="search" id="search" name="search" placeholder="Entrez un nom">
                <button class="search" onclick = 'searchlabo(<?php echo json_encode($labos); ?>,document.getElementById("search").value)'> Rechercher</button>
            </div>
            <div class="table-title">
                <table id= "table">
                    <thead id="table-head">
                        <th>Nom</th>
                        <th>Logo</th>
                        <th>Action</th>
                    </thead>
                    <tbody class="table-content">
                        <?php afficheTabLabo() ?>

                    </tbody>
                </table>
            </div>
        </div>
    </main>


    <?php 

        echo $footer;

    ?>
</body>

</html>