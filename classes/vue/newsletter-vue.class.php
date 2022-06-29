<?php

    require_once  (__DIR__.'../../model/newsletter.class.php');
   
    class Newsvue extends Newsletter {

        public function showNew($titre){
            $res = $this->selectNewsletter($titre);
            return  $res;
        }

        public function showNews(){
            $res = $this->selectNewsletters();
            return $res;
        }

        public function showAuthor($titre){
            $res = $this->getAuthor($titre);
            return  $res;
        }
        
    }