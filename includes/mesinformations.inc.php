<?php
include_once "../classes/controller/membre-contr.class.php";
include_once "../includes/functions.inc.php";
include_once "memberhtml.inc.php";
include_once '../classes/vue/membre-vue.class.php';
include_once "../classes/controller/historique-contr.class.php";
session_start();
       
if(isset($_POST["changepassword"]))
{

    
    $email= htmlspecialchars($_GET["email"]);

    $oldmdp = htmlspecialchars($_POST["oldmdp"]);
    $newmdp = htmlspecialchars($_POST["newmdp"]);
    $newmdp2 = htmlspecialchars($_POST["newmdp2"]);

    
    
    if(empty($email)) {
        exit();
        header("location: ../rubriques/mesInformations.php?error=unknownerror");
    }
    else if(empty($oldmdp) || empty($newmdp) || empty($newmdp2)) {
        exit();
        header("location: ../rubriques/mesInformations.php?error=emptyinput");
    }

    
        
    $mc = new Membrecontr('dummy', 'dummy', $email, 'dummy', 'dummy');

    
    $mc->changemdp2($oldmdp,$newmdp,$newmdp2);
    
    header("location: ../rubriques/mesInformations.php?reset=success");
}
else if(isset($_POST["changemembre"]))
{
   
    
    $oldtel = $_SESSION["telP"];


    $oldemail = $_SESSION["email"];
    
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $email = htmlspecialchars($_POST["email"]);
    $telP = htmlspecialchars($_POST["telP"]);
    $adresseP = htmlspecialchars($_POST["adresseP"]);
    $description = htmlspecialchars($_POST["description"]);
    
    
    include_once "../classes/controller/membre-contr.class.php";

    $membre =new Membrecontr($nom, $prenom, $oldemail, $telP, $adresseP);
    $mv = new Membrevue();

    $infos = $mv->showMembre($oldemail);


    
    $membre->changeMyInfo("nom", $nom);
    $membre->changeMyInfo("prenom", $prenom);
    $membre->changeMyInfo("adresseP", $adresseP);
    $membre->changeMyInfo("description", $description);
    if($oldtel!=$telP){
    $membre->changeMyInfo("telP", $telP);
    }
    if($oldemail!=$email){
    $membre->changeMyInfo("email", $email);
    }
    
    $_SESSION["email"]= $email;
    $_SESSION["nom"]= $nom;
    $_SESSION["prenom"]= $prenom;
    $_SESSION["telP"]= $telP;
    $_SESSION["adresseP"]= $adresseP;
    $_SESSION["description"]= $description;

    $modif= $infos[0]["nom"].'-->'.$nom.'</br>'. $infos[0]["prenom"].'-->'.$prenom.'</br>'. $infos[0]["telP"].'-->'.$telP.'</br>'. $infos[0]["adresseP"].'-->'.$adresseP.'</br>'.$infos[0]["description"].' --> '.$description. '</br>' .$infos[0]["email"].'-->'.$email. '</br>';
    
    $h = new Historiquecontr(date("Y-m-d H:i:s"), "Modification",$infos[0]["prenom"].' '.$infos[0]["nom"] , $modif, $_SESSION["nom"].' '.$_SESSION["prenom"]);

    $h->createHistorique();


    $f=fopen('../rubriques/membres/'.$_SESSION["fileid"].'.member.php','w');
    fwrite($f,createpage($nom, $prenom, $email, $adresseP, $telP, $description, $_SESSION["image"]));
    fclose($f);

    
    header("location: ../rubriques/mesInformations.php?error=none");
    
}
else if(isset($_POST["changeimage"])){

    $file = $_FILES['file'];

$fileName = $_FILES['file']['name'];
$fileTmpName = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileError = $_FILES['file']['error'];
$fileType = $_FILES['file']['type'];

$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));
$allowed = array('jpg', 'jpeg', 'png', 'pdf');


if(in_array($fileActualExt, $allowed)){
    if($fileError === 0) {
        if ($fileSize < 1000000) {
            $fileNameNew = uniqid('', true).".".$fileActualExt;
            $fileDestination = '../content/profile/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            
            
            
            $membre =new Membrecontr('dummy', 'dummy', $_SESSION["email"], 'dummy', 'dummy');
            $membre->changeMyInfo("image", $fileNameNew);
    
            $f=fopen('../rubriques/membres/'.$_SESSION["fileid"].'.member.php','w');
            fwrite($f,createpage($_SESSION["nom"], $_SESSION["prenom"], $_SESSION["email"], $_SESSION["adresseP"], $_SESSION["telP"], $_SESSION["description"], $fileNameNew));
            fclose($f);

            $_SESSION["image"]=$fileNameNew;

            header("Location: ../rubriques/mesInformations.php?error=none2");

        } else {
            header("Location: ../rubriques/mesInformations.php?error=filetoobig");
        }
    }
    else{
        header("Location: ../rubriques/mesInformations.php?error=unknown");
    }

} else {
    header("Location: ../rubriques/mesInformations.php?error=invalidtype");
}


    
}

else{
    header("location: ../index.php");
}