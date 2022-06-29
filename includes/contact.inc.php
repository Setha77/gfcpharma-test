<?php

include_once 'sendMails.inc.php';
include_once 'functions.inc.php';

if(isset($_POST["contact"]) && (isset($_POST['agree-required'])))
{

    
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $email = htmlspecialchars($_POST["email"]);
    $tel = htmlspecialchars($_POST["tel"]);
    $message = htmlspecialchars($_POST["message"]);


    if (!emptyInput($prenom, $nom, $email, $message, $tel)){

        header("location: ../rubriques/contact.php?error=emptyinput");
        
        exit();

    }
    


    sendMessage($message,$tel,$email,$nom,$prenom);
    header("location: ../rubriques/contact.php?message=sent");
    
    



}
else {
    
    
    header("location: ../rubriques/contact.php?checkbox=false");
    

}

