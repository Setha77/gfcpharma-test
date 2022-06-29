<?php 
include_once "../includes/functions.inc.php";
include_once "../includes/sendMails.inc.php";
include_once "../includes/memberhtml.inc.php";
require_once  (__DIR__.'../../model/membre.class.php');


class Membrecontr extends Membre{

    
    private $nom;
    private $prenom;
    private $email;
    private $mdp;
    private $telP;
    private $adresseP;
    private $image;

    public function __construct($nom, $prenom, $email, $telP, $adresseP) {

            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->email = $email;
            $this->mdp = generateRandomString();
            $this->telP = $telP;
            $this->adresseP = $adresseP;
            $this->description = " ";
            $this->filename = uniqid('', true);
    }


    public function createMembre(){
        if($this->emptyInput() == false) { 
            
            header("location: ../rubriques/ajoutmembre.php?error=emptyinput");
            exit();
        }
        
        if($this->invalidEmail() == false) {
            
            header("location: ../rubriques/ajoutmembre.php?error=email"); 
            exit();  
        }
        if($this->invalidAdress() == false) {
            
            header("location: ../rubriques/ajoutmembre.php?error=invalidadress"); 
            exit();  
        }
    
        if($this->emailTakenCheck() == false) {
            
            header("location: ../rubriques/ajoutmembre.php?error=emailtaken");  
            exit();
        }

        if($this->telTakenCheck() == false) {
            
            header("location: ../rubriques/ajoutmembre.php?error=userteltaken");  
            exit();
        }


        if($this->invalidTel() == false) {
            
            header("location: ../rubriques/ajoutmembre.php?error=invalidtel");  
            exit();
        }

        $hashedmdp =password_hash($this->mdp, PASSWORD_DEFAULT);

        $this->insertMembre($this->nom, $this->prenom, $this->email, $hashedmdp, $this->telP, $this->adresseP, $this->filename);
        
        $newMember = fopen('../rubriques/membres/'.$this->filename.'.member.php', 'w+');
        fwrite($newMember, createpage($this->nom, $this->prenom, $this->email, $this->adresseP, $this->telP, $this->description, $this->image));
        sendmdp($this->email, $this->mdp);
        
    }


    public function changeMyInfo($attribut, $modification){


        if($attribut=="telP"){
            if(($this->telTakenCheck() == false) || ($this->invalidTel() == false) ){
            
                header("location: ../rubriques/mesInformations.php?error=invalidtel");  
                exit();
            }
        }
        else if ($attribut=="email"){
            if(($this->emailTakenCheck() == false) || ($this->invalidEmail() == false) ){

                
                header("location: ../rubriques/mesInformations.php?error=invalidemail");  
                exit();
            }
        }else if ($this->invalidAdress() == false){

                header("location: ../rubriques/mesInformations.php?error=invalidadress");  
                exit();
        }

        if (!$this->checkUser($this->email)){
            $this->updateMembre($attribut, $modification, $this->email);
        
        }
        else{
            header("location: ../rubriques/mesInformations.php?error=userdoesnotexist");    
            exit();
        }

    }

    public function editInfo($attribut, $modification){

        if($attribut=="telP"){
            if(($this->telTakenCheck() == false) || ($this->invalidTel() == false) ){
            
                header("location: ../rubriques/gestionmembre.php?error=invalidtel");  
                exit();
            }
        }
        else if ($attribut=="email"){
            if(($this->emailTakenCheck() == false) || ($this->invalidEmail() == false) ){

                
                header("location: ../rubriques/gestionmembre.php?error=invalidemail");  
                exit();
            }
        }

        else if ($this->invalidAdress() == false){

            header("location: ../rubriques/gestionmembre.php?error=invalidadress");  
            exit();
        }

        if (!$this->checkUser($this->email)){
            $this->updateMembre($attribut, $modification, $this->email);
        }
        else{
            header("location: ../rubriques/editAdmin.php?error=userdoesnotexist");   
            exit();
        }

    }


    public function changemdp($modification){

        if (!$this->checkUser($this->email)){
            
            $this->updateMembre('mdp', $modification, $this->email);
        
        }
        else{
            header("location: ../rubriques/administration/gestionmembre.php?error=userdoesnotexist");  
            exit();
        }

    }

    public function changemdp2($oldmdp, $newmdp, $newmdp2){
        $result = $this->selectMembre($this->email);

        $checkPwd = password_verify($oldmdp, $result[0]["mdp"]);

        
        if($newmdp!=$newmdp2){
            $stmt = null;
            header("location: ../rubriques/mesInformations.php?error=different");
            exit();
        }
        
        if (!$this->checkUser($this->email)){

            if($checkPwd==false){

                $stmt = null;
                header("location: ../rubriques/mesInformations.php?error=wrongpassword");
                exit();
    
            }else{
            $hashednewmdp = password_hash($newmdp, PASSWORD_DEFAULT);
            $this->updateMembre('mdp', $hashednewmdp, $this->email);
            }
        }
        else{
            header("location: ../rubriques/mesInformations.php?error=usernotfound");   
            exit();
        }

    }


    public function removeMembre(){

        if ($this->checkUser($this->email)==false){
            $this->deleteMembre($this->email);
        }
        else{
            header("location: ../rubriques/administration/gestionmembre.php?error=userdoesnotexist");    
            exit();
        }

    }


    private function emptyInput() {
        $result;
        if(empty($this->nom) || empty($this->prenom) || empty($this->email) || empty($this->telP) || empty($this->adresseP) ) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail() {
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }


    private function emailTakenCheck(){
        $result;
        if (!$this->checkUser($this->email)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    private function invalidTel(){
        if(preg_match('/^[0-9]{10}+$/', $this->telP)) {
            return true;
            } else {
            return false;
            }
    }

    private function telTakenCheck(){
        $result;
        if (!$this->checkUser($this->telP)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }


    private function invalidAdress() {
        $result;
        if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $this->adresseP)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

}
