<?php

    require_once  (__DIR__.'../../model/labo.class.php');
   
    class Labovue extends Labo {

        public function showLabo($nom){
            $res = $this->selectLabo($nom);
            return  $res;
        }

        public function showLabos(){
            $res = $this->selectLabos();
            return $res;
        }

    }