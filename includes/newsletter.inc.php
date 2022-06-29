<?php
include_once "../classes/vue/newsletter-vue.class.php";
include_once "../classes/controller/newsletter-contr.class.php";
include_once "../includes/functions.inc.php";
include_once "../includes/parties.inc.php";

session_start();
timeout();

if(isset($_POST["createnews"]))
{
    $titre = htmlspecialchars($_POST["titre"]);
    $option = htmlspecialchars($_POST["type-news"]);
    $contenu = htmlspecialchars($_POST["description"]);
    $email = $_SESSION["email"];


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
                $fileDestination = '../content/newsletter/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                
                
                include_once "../classes/dbh.class.php";
                include_once "../classes/controller/newsletter-contr.class.php";
                $n =new Newscontr($titre, $contenu, $option, $email, $fileNameNew);
            
                
                $n->createNewsletter();
            
                header("location: ../rubriques/newsletter.php?error=none");
    
            } else {
                header("Location: ../rubriques/newsletter.php?error=filetoobig");
            }
        }
        else{
            header("Location: ../rubriques/newsletter.php?error=unknown");
        }
    }
    else {
        header("Location: ../rubriques/newsletter.php?error=invalidtype");
    }
    
    if($option=="3"){
        header("location: ../rubriques/newsletter.php?error=option");
        exit();
    }
    



    


}
else if(isset($_POST["validate"])){

    $titre = htmlspecialchars($_GET["nom"]);

    $nv=new Newsvue();

    $result= $nv->showNew($titre);

    $n =new Newscontr($titre, ' ', ' ', ' ', ' ');

    $n->validate();

    header("location: ../rubriques/gestionnews.php?action=validate");

}
else if(isset($_POST["delete"])){

    $titre = htmlspecialchars($_GET["nom"]);

    $nv=new Newsvue();

    $result= $nv->showNew($titre);

    $n =new Newscontr($titre, 'dummy', 'dummy', 'dummy', 'dummy');

    $n->removeNews();

    unlink('../rubriques/newsletters/'.$result[0]["fileid"].'.news.php');

    header("location: ../rubriques/gestionnews.php?action=delete");

}
else{
    header("location: ../index.php");
}