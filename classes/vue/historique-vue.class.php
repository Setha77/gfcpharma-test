<?php
    require_once  (__DIR__.'../../model/historique.class.php');

    class Historiquevue extends Historique {

        public function showHistorique(){
            $res = $this->selectHistorique();
            return $res;
        }
    }