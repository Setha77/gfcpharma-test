<?php
   require_once  (__DIR__.'../../dbh.class.php');

   
class Newsletter extends Dbh {
        
    protected function selectNewsletter($titre){
        $stmt = $this->connect()->prepare('SELECT * FROM newsletters WHERE titre=?;');

        if(!$stmt->execute(array($titre))) {
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

      


        protected function selectNewsletters(){
            $stmt = $this->connect()->prepare('SELECT * FROM newsletters ;');

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



        protected function getAuthor($titre){
            $stmt = $this->connect()->prepare('SELECT nom,prenom FROM membres WHERE id=(SELECT idM FROM newsletters WHERE titre=?);');
    
            if(!$stmt->execute(array($titre))) {
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


        protected function insertNewsletter($titre, $contenu, $isPublic, $date, $fileid, $img, $email){
            $stmt = $this->connect()->prepare('INSERT INTO newsletters (titre, contenu, isPublic, date, fileid, img, idM) VALUES (?, ?, ?, ?, ?, ?, (SELECT id FROM membres WHERE email=?));');

            if(!$stmt->execute(array($titre, $contenu, $isPublic, $date, $fileid, $img, $email))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");   
                exit();
            }

            $stmt = null;

        }

        protected function validNewsletter($titre){
            
            $stmt = $this->connect()->prepare('SELECT * FROM newsletters WHERE titre=?;');

            if(!$stmt->execute(array($titre))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");    
                exit();
            }
    
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../index.php?error=notfound");    
                exit();
            }
        
            $stmt = $this->connect()->prepare('UPDATE newsletters SET isValid = ? WHERE titre=?;');

            if(!$stmt->execute(array(1, $titre))) {
                $stmt = null; 
                header("location: ../index.php?error=stmtfailed");    
                exit();
            }

            $stmt = null;
        }



        protected function deleteNewsletter($titre){
            $stmt = $this->connect()->prepare('DELETE FROM newsletters WHERE titre=?;');

            if(!$stmt->execute(array($titre))) {
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


        protected function checkNews($titre){
            $stmt = $this->connect()->prepare('SELECT * FROM newsletters WHERE titre=?;');
        
            if(!$stmt->execute(array($titre))) {
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
