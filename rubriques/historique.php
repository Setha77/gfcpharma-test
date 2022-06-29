<?php
include_once "../includes/affichetab.inc.php";
include_once "../includes/parties.inc.php";
include_once "../includes/functions.inc.php";
include_once '../classes/vue/historique-vue.class.php';

session_start();
timeout();

$l = new Historiquevue();

$logs = $l->showHistorique();


foreach ($logs as &$value) {
    unset($value["id"]);
    unset($value["date"]);
    unset($value["action"]);
    unset($value["nom"]);
    unset($value["modif"]);
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


              
                <input type="search" id="search" name="search" placeholder="Entrez un auteur">
                <button class="search" onclick = 'searchlog(<?php echo json_encode($logs) ?>,document.getElementById("search").value)'> Rechercher</button>
            </div>
            <div class="table-title">
                <table id= "table">
                    <thead id="table-head">
                        <th>Date</th>
                        <th>Action</th>
                        <th>Membre</th>
                        <th>Auteur</th>
                    </thead>
                    <tbody class="table-content">
                        <?php affichetablogs() ?>

                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>

</html>