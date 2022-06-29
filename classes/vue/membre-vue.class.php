<?php

    require_once  (__DIR__.'../../model/membre.class.php');
   
    class Membrevue extends Membre {

        public function showMembre($email){
            $res = $this->selectMembre($email);
            return  $res;
        }

        public function showMembres(){
            $res = $this->selectMembres();
            return $res;
        }

    }