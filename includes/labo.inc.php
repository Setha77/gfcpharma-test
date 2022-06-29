<?php

include_once "../classes/dbh.class.php";
include_once "../classes/model/labo.class.php";
include_once "../classes/controller/labo-contr.class.php";

if(isset($_POST['ajoutlabo'])){

$nom = htmlspecialchars($_POST["nom"]);

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
            $fileDestination = '../content/labo/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            
            
            
            $labo =new Labocontr($nom, $fileNameNew);

    
            $labo->createLabo();

            header("Location: ../rubriques/ajouterPartenaire.php?error=none");

        } else {
            header("Location: ../rubriques/ajouterPartenaire.php?error=filetoobig");
        }
    }
    else{
        header("Location: ../rubriques/ajouterPartenaire.php?error=unknown");
    }

} else {
    header("Location: ../rubriques/ajouterPartenaire.php?error=invalidtype");
}
}


/**************************PAS FINI  ********************/
/*
else if((isset($_POST['changelabo']))&&(isset($_GET()))){
    $nom = htmlspecialchars($_POST["nom"]);

    $labo =new Labocontr($nom, 'dummy');

    $res=$labo2->getLabo();

    

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
                $fileDestination = '../content/labo/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                
                
                
                $labo =new Labocontr($nom, $fileNameNew);

        
                $labo->changeLabo('logo',$fileNameNew);

                header("Location: index.php?error=none");

            } else {
                header("Location: index.php?error=filetoobig");
            }
        }
        else{
            header("Location: index.php?error=unknown");
        }

    } else {
        header("Location: index.php?error=invalidtype");
    }


}
*/
else{
    header("location: ../index.php");
}

