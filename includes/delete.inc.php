<?php
include_once "../classes/controller/historique-contr.class.php";
session_start();


if((isset($_POST["delete"]))&&(isset($_GET["email"]))){

    $email = htmlspecialchars($_GET["email"]);

    if($email==$_SESSION["email"]){
        
        header("location: ../rubriques/gestionmembre.php?delete=impossible");
        exit();
    }
    if($_SESSION["isAdmin"]==0){
        
        header("location: ../rubriques/gestionmembre.php?delete=unauthorized");
        exit();
    }

    include_once "../classes/controller/membre-contr.class.php";
     
    include_once "../classes/vue/membre-vue.class.php";

    $mv = new Membrevue();

    $mc = new Membrecontr('dummy', 'dummy', $email, 'dummy', 'dummy');
    
    $res = $mv->showMembre($email);
    
    unlink('../rubriques/membres/'.$res[0]["fileid"].'.member.php');

    $mc->removeMembre();

    $h = new Historiquecontr(date("Y-m-d H:i:s"), "Suppresion", $res[0]["nom"].' '.$res[0]["prenom"], " ", $_SESSION["nom"].' '.$_SESSION["prenom"]);

    $h->createHistorique();

    header('location: ../rubriques/gestionmembre.php?delete=success');

    
}
else if((isset($_POST["delete"]))&&(isset($_GET["nom"]))){

    $nom = htmlspecialchars($_GET["nom"]);

    if($_SESSION["isAdmin"]==0){
        
        header("location: ../rubriques/gestionmembre.php?delete=unauthorized");
        exit();
    }

    include_once "../classes/controller/labo-contr.class.php";
     
    include_once "../classes/vue/labo-vue.class.php";

    $lv = new Labovue();

    $lc = new Labocontr($nom, 'dummy');
    
    $res = $lv->showLabo($nom);
    
    unlink('../content/labo/'.$res[0]["logo"]);

    $lc->removeLabo();

    header('location: ../rubriques/gestionPartenaire.php?delete=success');
}
else{
    header("location: ../index.php");
}







