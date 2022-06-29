<?php 
include_once "../includes/functions.inc.php";
require_once  (__DIR__.'../../model/labo.class.php');


class Labocontr extends Labo{

    private $nom;
    private $logo;

    public function __construct($nom, $logo) {
            $this->nom = $nom;
            $this->logo = $logo;
    }

    public function getLabo(){
        $res = $this->selectLabo($this->nom);
        return  $res;
    }


    public function createLabo(){
        if($this->emptyInput() == false) {
            header("location: ../rubriques/ajouterPartenaire.php.php?error=emptyinput");                           
            exit();
        }

        if($this->nomTakenCheck() == false) {
            header("location: ../rubriques/ajouterPartenaire.php?error=laboNametaken");                          
            exit();
        }
        
        $this->insertLabo($this->nom,$this->logo);
        
    }

    public function removeLabo(){

        if ($this->checkLabo($this->nom)==false){
            $this->deleteLabo($this->nom);
        }
        else{
            header("location: ../rubriques/gestionPartenaire.php?error=userdoesnotexist");               
            exit();
        }

    }

    public function changeLabo($attribut, $modification){

        if (!$this->checkLabo($this->nom)){
            $this->updateLabo($attribut, $modification, $this->nom);
        
        }
        else{
            header("location: ../rubriques/administration/gestionPartenaire.php?error=userdoesnotexist");   
            exit();
        }

    }


    private function emptyInput() {
        $result;
        if(empty($this->nom)||empty($this->logo)){
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function nomTakenCheck(){
        $result;
        if (!$this->checkLabo($this->nom)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

}
