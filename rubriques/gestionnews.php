<?php
include_once "../includes/affichetab.inc.php";
include_once "../includes/parties.inc.php";
include_once "../includes/functions.inc.php";
include_once '../classes/vue/newsletter-vue.class.php';

session_start();
timeout();


if(isset($_GET["action"])){
    if(htmlspecialchars($_GET["action"]== "validate")) {
        function_alert('Newsletter publiée.'); 
    }
    if(htmlspecialchars($_GET["action"]== "delete")) {
        function_alert('Newsletter refusée.'); 
    }        
}
if(isset($_GET["error"])){
    if(htmlspecialchars($_GET["error"]== "newsdoesnotexist")) {
        function_alert('Erreur : Newsletter introuvable'); 
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../content/gestionnews.css" />
    <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=N9XXch-f9sPAmdXRuRJD4KrNoW1v1jWjcZZ7kRJ16kq0lJO1MCsRwNkjZpZCCLse4ClnQEnBq6fZxtYYcjca7GXv9W8kpgbZbo8THQWgVwA3qrhl2iwWW-blOvT9XwA9GhnsEdYXdIewn9Ja96zZQg" charset="UTF-8"></script><script src="https://kit.fontawesome.com/1d2e5bc245.js" crossorigin="anonymous"></script>
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
                <p>Liste des newsletters en attente de validation</p>

                <input placeholder="newsletters">
                <button class="search"> Rechercher</button>
            </div>
            <div class="table-title">
                <table>
                    <thead>
                        <th>Membre</th>
                        <th>Titre</th>
                        <th>Date de création</th>
                        <th>Visibilité</th>
                        <th>Aperçu</th>
                        <th>Action</th>
                    </thead>
                    <tbody class="table-content">
                        <?php
                            afficheTabNews()
                        ?>
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