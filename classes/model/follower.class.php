<?php
    require_once  (__DIR__.'../../dbh.class.php');
    class Follower extends Dbh{

        protected function selectFollowers(){
            $stmt = $this->connect()->prepare('SELECT * FROM followers ;');

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

        protected function insertFollower($email){
            $stmt = $this->connect()->prepare('INSERT INTO followers (email) VALUES (?);');

            if(!$stmt->execute(array($email))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");   
                exit();
            }

            $stmt = null;

        }

        protected function deleteFollower($email){
            $stmt = $this->connect()->prepare('DELETE FROM followers WHERE email = ?;');

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
        
        protected function checkFollower($email){
            $stmt = $this->connect()->prepare('SELECT * FROM followers WHERE email = ?;');
        
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
            
            $stmt=null;

            return $resultCheck;
        }
    }