<?php
    require_once  (__DIR__.'../../dbh.class.php');
    

    class Resetpassword extends Dbh {

        

        protected function insertReset($selector, $hashedToken, $userEmail,  $expires){
            $stmt = $this->connect()->prepare("INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);");
            
            if(!$stmt->execute(array($userEmail, $selector, $hashedToken, $expires))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");    
                exit();
            }

            $stmt = null;

        }

        protected function deleteReset($email){
            $stmt = $this->connect()->prepare('DELETE FROM pwdreset WHERE pwdResetEmail = ?;');

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
        

        protected function selectReset($selector, $currentDate){
            $stmt = $this->connect()->prepare("SELECT * FROM pwdreset WHERE pwdResetSelector=? AND pwdResetExpires >= ? ;");

            if(!$stmt->execute(array($selector, $currentDate))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }
    
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../index.php?error=resetnotfound"); 
                exit();
            }

            $pwdreset = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $pwdreset;
        }


        protected function checkUser($email){
            $stmt = $this->connect()->prepare('SELECT email FROM membres WHERE email = ?;');
        
            if(!$stmt->execute(array($email))) {
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
    
            return $resultCheck;
        }


        protected function checkReset($email){
            $stmt = $this->connect()->prepare("SELECT * FROM pwdreset WHERE pwdResetEmail=?;");
        
            if(!$stmt->execute(array($email))) {
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
    
            return $resultCheck;
        }

    }