<?php 
include_once "../includes/functions.inc.php";



class Followercontr extends Follower{

    private $email;

    public function __construct($email) {
            $this->email = $email;
    }


    public function createFollower(){
        if($this->emptyInput() == false) {
            header("location: ../rubriques/newsinscription.php?error=emptyinput");                          
            exit();
        }
        
        if($this->invalidEmail() == false) {
            
            header("location: ../rubriques/newsinscription.php?error=email");                               
            exit();
        }
    
        if($this->emailTakenCheck() == false) {
            
            header("location: ../rubriques/newsinscription.php?error=useroremailtaken");              
            exit();
        }

        $this->insertFollower($this->email);
        
    }

    public function removeFollower(){

        if ($this->checkFollower($this->email)==false){
            $this->deleteFollower($this->email);
        }
        else{
            header("location: ../rubriques/newsinscription.php?error=userdoesnotexist");                
            exit();
        }

    }


    private function emptyInput() {
        $result;
        if(empty($this->email)) {
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
        if (!$this->checkFollower($this->email)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

}
