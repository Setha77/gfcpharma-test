<?php
require_once  (__DIR__.'../../dbh.class.php');
    class Labo extends Dbh {
        protected function selectLabo($nom){
            $stmt = $this->connect()->prepare('SELECT * FROM partenaires WHERE nom = ?;');

            if(!$stmt->execute(array($nom))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }
    
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../index.php?error=notfound");
                exit();
            }
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }


        protected function selectLabos(){
            $stmt = $this->connect()->prepare('SELECT * FROM partenaires ;');

            if(!$stmt->execute()) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");     
                exit();
            }
    
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../index.php?error=notfound");     
            }

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;


        }

        protected function insertLabo($nom, $logo){
            $stmt = $this->connect()->prepare('INSERT INTO partenaires (nom, logo) VALUES (?,?);');

            if(!$stmt->execute(array($nom, $logo))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }
        }

        protected function updateLabo($attribut, $modification, $nom){
            
            $stmt = $this->connect()->prepare('SELECT * FROM partenaires WHERE nom = ?;');

            if(!$stmt->execute(array($nom))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");   
                exit();
            }
    
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../index.php?error=notfound");    
                exit();
            }
        
            $stmt = $this->connect()->prepare('UPDATE partenaires SET '.$attribut. '= ? WHERE  nom = ?;');

            if(!$stmt->execute(array($modification, $nom))) {
                $stmt = null; 
                header("location: ../index.php?error=stmtfailed");    
                exit();
            }

            $stmt = null;
        }


        protected function deleteLabo($nom){

            
            $stmt = $this->connect()->prepare('DELETE FROM partenaires WHERE nom = ?;');

            if(!$stmt->execute(array($nom))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");   
                exit();
            }
    
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../index.php?error=notfound");    
                exit();
            }

            $stmt = null;
        }


        protected function checkLabo($nom){
            $stmt = $this->connect()->prepare('SELECT * FROM partenaires WHERE nom = ? ;');
        
            if(!$stmt->execute(array($nom))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");   
                exit();
            }
    
            $resultCheck;
    
            if($stmt->rowCount() > 0){
                $resultCheck = false;
            }
            else {
                $resultCheck = true;
            }
            
            $stmt=null;

            return $resultCheck;
        }
    }
?>