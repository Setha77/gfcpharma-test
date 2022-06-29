<?php
   require_once  (__DIR__.'../../dbh.class.php');

   
class Membre extends Dbh {
        
    protected function selectMembre($email){
        $stmt = $this->connect()->prepare('SELECT * FROM membres WHERE email = ?;');

        if(!$stmt->execute(array($email))) {
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

      


        protected function selectMembres(){
            $stmt = $this->connect()->prepare('SELECT * FROM membres ;');

            if(!$stmt->execute()) {
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


        protected function insertMembre($nom, $prenom, $email, $mdp, $telP, $adresseP, $filename){
            $stmt = $this->connect()->prepare('INSERT INTO membres (nom, prenom, email, mdp, telP, adresseP, fileid) VALUES (?, ?, ?, ?, ?, ?, ?);');

            if(!$stmt->execute(array($nom, $prenom, $email, $mdp, $telP, $adresseP, $filename))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");    
                exit();
            }

            $stmt = null;

        }

        protected function updateMembre($attribut, $modification, $email){
            
            $stmt = $this->connect()->prepare('SELECT * FROM membres WHERE email = ?;');

            if(!$stmt->execute(array($email))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");    
                exit();
            }
    
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../index.php?error=notfound");   
                exit();
            }
        
            $stmt = $this->connect()->prepare('UPDATE membres SET '.$attribut.'= ? WHERE  email = ?;');

            if(!$stmt->execute(array($modification, $email))) {
                $stmt = null; 
                header("location: ../index.php?error=stmtfailed");   
                exit();
            }

            $stmt = null;
        }



        protected function deleteMembre($email){
            $stmt = $this->connect()->prepare('DELETE FROM membres WHERE email = ?;');

            if(!$stmt->execute(array($email))) {
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


        protected function checkUser($email){
            $stmt = $this->connect()->prepare('SELECT * FROM membres WHERE email = ? OR telP = ?;');
        
            if(!$stmt->execute(array($email,$email))) {
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
