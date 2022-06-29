<?php 

class LoginContr extends Login{

    private $email;
    private $mdp;
    

    public function __construct($email, $mdp) {

            $this->email = $email;
            $this->mdp = $mdp;
            
    }

    public function loginUser(){
        if($this->emptyInput() == false) {
            header("location: ../rubriques/connect.php?error=emptyinput");
            exit();
        }
       

        $this->getUser($this->email, $this->mdp);
    }

    private function emptyInput() {
        $result;
        if(empty($this->email) || empty($this->mdp) ) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }



}
