<?php
session_start();
if(isset($_POST["ajoutmembre"]))
{

    
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $email = htmlspecialchars($_POST["email"]);
    $telP = htmlspecialchars($_POST["telP"]);
    $adresseP = htmlspecialchars($_POST["adresseP"]);
    
    include_once "../classes/dbh.class.php";
    include_once "../classes/model/membre.class.php";
    include_once "../classes/controller/membre-contr.class.php";
    $membre =new Membrecontr($nom, $prenom, $email, $telP, $adresseP);

    
    $membre->createMembre();
    
    
    
    header("location: ../rubriques/ajoutmembre.php?error=none");

}

else{
    header("location: ../index.php");
}