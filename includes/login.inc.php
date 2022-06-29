<?php

if(isset($_POST["connexion"]))
{

   
    $email = htmlspecialchars($_POST["email"]);
    $mdp = htmlspecialchars($_POST["mdp"]);

    
    include_once "../classes/dbh.class.php";
    include_once "../classes/model/login.class.php";
    include_once "../classes/controller/login-contr.class.php";
    $login =new LoginContr($email, $mdp);

    
    $login->loginUser();
    

    
    header("location: ../index.php?error=none");

}
else{
    header("location: ../index.php");
}