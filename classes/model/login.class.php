<?php

class Login extends Dbh {

    protected function getUser($email, $mdp){
        $stmt = $this->connect()->prepare('SELECT mdp FROM membres WHERE email = ?;');
    
        

        if(!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: ../rubriques/connect.php?error=usernotfound");
            exit();
        }

        $mdpHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($mdp, $mdpHashed[0]["mdp"]);
        

        if($checkPwd==false){
            $stmt = null;
            header("location: ../rubriques/connect.php?error=wrongpassword");
            exit();
        }
        else if($checkPwd == true) {

            $stmt = $this->connect()->prepare('SELECT * FROM membres WHERE email = ? AND mdp = ?;');

            if(!$stmt->execute(array($email, $mdpHashed[0]["mdp"]))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }


            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../rubriques/connect.php?error=usernotfound");
                exit();
            }
            

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);


            if($user[0]["isActif"]==0){
                header("location: ../rubriques/connect.php?error=inactif");
                exit();
            }

            session_start();
            $_SESSION["id"]= $user[0]["id"];
            $_SESSION["email"]= $user[0]["email"];
            $_SESSION["nom"]= $user[0]["nom"];
            $_SESSION["prenom"]= $user[0]["prenom"];
            $_SESSION["telP"]= $user[0]["telP"];
            $_SESSION["adresseP"]= $user[0]["adresseP"];
            $_SESSION["description"]= $user[0]["description"];
            $_SESSION["image"]= $user[0]["image"];
            $_SESSION["isAdmin"]= $user[0]["isAdmin"];
            $_SESSION["isActif"]= $user[0]["isActif"];
            $_SESSION["fileid"]= $user[0]["fileid"];
            $_SESSION['start'] = time();

            $stmt = null;
        
        }

    }
    
}

