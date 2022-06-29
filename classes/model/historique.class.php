<?php
require_once  (__DIR__.'../../dbh.class.php');
    class Historique extends Dbh {

        protected function insertHistorique($date, $action, $nom, $modif, $auteur){
            $stmt = $this->connect()->prepare('INSERT INTO historique(date, action, nom, modif, auteur) VALUES (?, ?, ?, ?, ?);');

            if(!$stmt->execute(array($date, $action, $nom, $modif, $auteur))){
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }
        }

        protected function selectHistorique(){
            $stmt = $this->connect()->prepare('SELECT * FROM historique;');
            
            if(!$stmt->execute()){
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
    }