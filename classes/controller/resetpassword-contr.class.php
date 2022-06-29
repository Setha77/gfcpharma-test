<?php 
include_once "../includes/sendMails.inc.php";
require_once  (__DIR__.'../../model/resetpassword.class.php');

class Resetpasswordcontr extends Resetpassword{


    

    public function createReset($email){


         
        $selector = bin2hex(random_bytes(8));
        $token =  random_bytes(32);
        $expires = date("U") + 1800;

        
        if($this->emptyInput($email) == false) {
            header("location: ../rubriques/mdp.php?error=emptyinput");                          
            exit();
        }
        
        
    
        if($this->checkUser($email) == true) {
            
            header("location: ../rubriques/mdp.php?error=usernotfound");               
            exit();
        }

        if($this->checkReset($email) == false) {     
            $this->deleteReset($email);
        }

        $url = "localhost/gfcpharma/rubriques/newmdp.php?selector=" . $selector . "&validator=" . bin2hex($token);     
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);

        $this->insertReset($selector, $hashedToken, $email, $expires);

        sendreset($url, $email);

        

    }

    public function removeReset($email){
            $this->deleteReset($email);
    }

    public function getReset($selector, $currentDate){

        $r = $this->selectReset($selector, $currentDate);
        return $r;
    }





    private function emptyInput($email) {
        $result;
        if(empty($email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

}