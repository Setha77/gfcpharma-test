<?php
include_once "../includes/functions.inc.php";
include_once "../includes/sendMails.inc.php";
include_once "../includes/memberhtml.inc.php";
require_once  (__DIR__.'../../model/newsletter.class.php');

class Newscontr extends Newsletter{

    
private $titre;
private $contenu;
private $isPublic;
private $date;
private $filename;
private $img;
private $email;

public function __construct($titre, $contenu, $isPublic, $email, $img) {

        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->isPublic = $isPublic;
        $this->date = date("Y-m-d H:i:s");
        $this->filename = uniqid('', true)."_".date("Y-m-d H-i-s");
        $this->img = $img;
        $this->email = $email;
        
}


public function createNewsletter(){
    if($this->emptyInput() == false) { 
        
        header("location: ../rubriques/newsletter.php?error=emptyinput");
        exit();
    }
    

    if($this->titreTakenCheck() == false) {
        
        header("location: ../rubriques/newsletter.php?error=titretaken");  
        exit();
    }

    $this->insertNewsletter($this->titre, $this->contenu, $this->isPublic, $this->date, $this->filename, $this->img, $this->email);


    
    $newLetter = fopen('../rubriques/newsletters/'.$this->filename.'.news.php', 'w+');
    fwrite($newLetter, createNews($this->titre, $this->contenu, $this->img));
    
}

// Pour l'instant cette fonction ne fait rendre une newsletter visible

public function validate(){

    if (!$this->checkNews($this->titre)){
        
        $this->validNewsletter($this->titre);

        // ICI METTRE FONCTION QUI ENVOIE LA NEWSLETTER PAR MAIL 

        /*  FONCTION QUE L'ON PREVOYAIT D'UTILISE MAIS JAMAIS TESTE :
        
            sendNewsletters($body,$email,$img,$isPublic);
        
        */
    }
    else{
        header("location: ../rubriques/gestionnews.php?error=newsdoesnotexist");   
        exit();
    }

}



public function removeNews(){

    if (!$this->checkNews($this->titre)){
        $this->deleteNewsletter($this->titre);
    }
    else{
        header("location: ../rubriques/gestionnews.php?error=newsdoesnotexist");    
        exit();
    }

}


private function emptyInput() {
    $result;
    if(empty($this->titre) || empty($this->contenu) || empty($this->email)) {
        $result = false;
    }
    else {
        $result = true;
    }
    return $result;
}


private function titreTakenCheck(){
    $result;
    if (!$this->checkNews($this->titre)){
        $result = false;
    }
    else{
        $result = true;
    }
    return $result;
}

}
