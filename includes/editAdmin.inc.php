<?php
include_once "functions.inc.php";
include_once "memberhtml.inc.php";
include_once "../classes/controller/historique-contr.class.php";
include_once '../classes/vue/membre-vue.class.php';
session_start();

if((isset($_POST["editMembre"]))&& (isset($_GET["email"])) && (isset($_GET["tel"])) && (isset($_GET["file"])))
{
    $useremail = htmlspecialchars($_GET["email"]);
    $useretel = htmlspecialchars($_GET["tel"]);
    $userefile = htmlspecialchars($_GET["file"]);
    
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $email = htmlspecialchars($_POST["email"]);
    $telP = htmlspecialchars($_POST["telP"]);
    $adresseP = htmlspecialchars($_POST["adresseP"]);
    $affirmation = htmlspecialchars($_POST['affirmation']);
    $affirmation2 = htmlspecialchars($_POST['affirmation2']);
    $description = htmlspecialchars($_POST['description']);


    $mv = new Membrevue();

    $infos = $mv->showMembre($useremail);

    if(empty($nom) || empty($prenom) || empty($email) || empty($telP) || empty($adresseP)) {
        exit();
        header("location: ../rubriques/gestionmembre.php?error=emptyinput");
    }




    if($affirmation=="Yes"){
        $isAdmin = 1;
    }
    else if($affirmation == "No"){
        $isAdmin = 0;
    }

    if($affirmation2 =="Yes"){
        $isActif = 1;
    }
    else if($affirmation2 == "No"){
        $isActif = 0;
    }
    
    include_once "../classes/controller/membre-contr.class.php";

    $membre =new Membrecontr($nom, $prenom, $useremail, $telP, $adresseP);


    
    $membre->editInfo("nom", $nom);
    $membre->editInfo("prenom", $prenom);
    $membre->editInfo("adresseP", $adresseP);
    if($useretel!=$telP){
    $membre->editInfo("telP", $telP);
    }
    $membre->editInfo("isAdmin", $isAdmin);
    $membre->editInfo("isActif", $isActif);
    $membre->editInfo("description", $description);
    if($useremail!=$email){
    $membre->editInfo("email", $email);
    }

    if($useremail==$_SESSION["email"]){

    $_SESSION["nom"]= $nom;
    $_SESSION["prenom"]= $prenom;
    $_SESSION["telP"]= $telP;
    $_SESSION["adresseP"]= $adresseP;
    $_SESSION["isAdmin"]= $isAdmin;
    $_SESSION["isActif"]= $isActif;
    $_SESSION["description"]= $description;
    $_SESSION["email"]= $email;

    }


    $modif= $infos[0]["nom"].'-->'.$nom.'</br>'. $infos[0]["prenom"].'-->'.$prenom.'</br>'. $infos[0]["telP"].'-->'.$telP.'</br>'. $infos[0]["adresseP"].'-->'.$adresseP.'</br>'. role($infos[0]["isAdmin"]).'-->'.role($isAdmin).'</br>'. statut($infos[0]["isActif"]).'-->'.statut($isActif). '</br>' .$infos[0]["description"].' --> '.$description. '</br>' .$infos[0]["email"].'-->'.$email. '</br>';
    
    $h = new Historiquecontr(date("Y-m-d H:i:s"), "Modification",$infos[0]["prenom"].' '.$infos[0]["nom"] , $modif, $_SESSION["nom"].' '.$_SESSION["prenom"]);

    $h->createHistorique();
    
    $f=fopen('../rubriques/membres/'.$userefile.'.member.php','w');
    fwrite($f,createpage($nom, $prenom, $email, $adresseP, $telP, $description, $infos[0]["image"]));
    fclose($f);




    header("location: ../rubriques/gestionmembre.php?error=none");
    
}

else{
    header("location: ../index.php");
}

