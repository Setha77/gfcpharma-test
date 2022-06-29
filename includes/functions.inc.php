<?php
        require_once __DIR__.'../../classes/vue/follower-vue.class.php';
        require_once __DIR__.'../../classes/vue/membre-vue.class.php';
        include_once "parties.inc.php";
        

        //pour creer chaîne de caractères aléatoires

        function generateRandomString($length = 8) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }

        //retourner ce à quoi correspond la valeur isAdmin

        function role($role){
            if($role==1){
                return "Admin";
            }
            else {
                return "Membre";
            }
        }

        //retourner ce à quoi correspond la valeur isActif

        function statut($statut){
            if($statut==1){
                return "Actif";
            }
            else {
                return "Inactif";
            }
        }

        //verifie si tout les champs ont été remplis 

        function emptyInput($prenom, $nom, $email, $message, $telP) {
            $result;
            if(empty($nom) || empty($prenom) || empty($email) || empty($telP) || empty($message) ) {
                $result = false;
            }
            else {
                $result = true;
            }
            return $result;
        }

        //afficher une alerte js

        function function_alert($message) { 
              
            
            echo "<script> 
            var x = '$message ';
            alert(x);</script>"; 
        } 

        //expiration de session

        function timeout(){
            if (isset($_SESSION['start']) && (time() - $_SESSION['start'] > 1800000000000000000)) {
                session_start();
                session_unset(); 
                session_destroy(); 
                header("location: ../index.php?session=expired");
            }
        }

        
        function afficheNav($navAdmin, $navMembre, $nav){
            if (isset($_SESSION["id"])){
                if($_SESSION["isActif"]==1 && $_SESSION["isAdmin"]==1){
                    echo $navAdmin;
                }
                if($_SESSION["isActif"]==1 && $_SESSION["isAdmin"]==0){
                    echo $navMembre;
                }
            }
            else{
                echo $nav;
            }
        }


        function visibility($statut){
            if($statut==1){
                return "Publique";
            }
            else {
                return "Privée";
            }
        }


        function sendNewsletters($body,$email,$img, $vis){

            $f = new Followervue();
            $m = new Membrevue();

            $followers = $f->showFollowers();
            $membres = $m->showMembres();

            if($vis==1){

                for ($i = 0; $i < sizeof($followers); $i++){

                    sendNewsletter(createNewsMail($titre, $contenu, $followers[$i]["email"]),$followers[$i]["email"],$img);

                }

            }else if(vis==0){
                for ($i = 0; $i < sizeof($membres); $i++){

                    sendNewsletter(createNewsMail($titre, $contenu, $membres[$i]["email"]),$membres[$i]["email"],$img);

                }

            }


        }