<?php
include_once '../classes/controller/resetpassword-contr.class.php';
include_once '../classes/controller/membre-contr.class.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST["reset-request-submit"])) {

    $email= htmlspecialchars($_POST["email"]);



    $rp = new Resetpasswordcontr();

    $rp->createReset($email);

    header("Location: ../rubriques/mdp.php?reset=sent");
}


else if (isset($_POST["reset-password-submit"])) {

    $selector = htmlspecialchars($_GET["selector"]);
    $validator = htmlspecialchars($_GET["validator"]);
    $password = htmlspecialchars($_POST["pwd"]);
    $passwordRepeat = htmlspecialchars($_POST["pwd-repeat"]);

    $rp2 = new Resetpasswordcontr();
    
    if (empty($password) || empty($passwordRepeat)) {
        header("Location: ../create-new-password.php?newpwd=empty");
        
        exit();
    }else if ($password != $passwordRepeat) {
        header("Location: ../create-new-password.php?newpwd=notequal");
        exit();
    }

    $currentDate = date("U");

    $result=$rp2->getReset($selector,$currentDate);
    
    
    $tokenBin = hex2bin($validator);
    $tokenCheck = password_verify($tokenBin, $result[0]["pwdResetToken"]);

    if ($tokenCheck == false){
        echo "You need to re-submit your reset request.";
        exit();
    } else if ($tokenCheck== true){

        
        $tokenEmail = $result[0]["pwdResetEmail"];
     
        $newPwdHash = password_hash($password, PASSWORD_DEFAULT);

        $mc = new Membrecontr('dummy', 'dummy', $tokenEmail, 'dummy', 'dummy');

        $mc->changemdp($newPwdHash);

        $rp2->removeReset($tokenEmail);
        header("Location: ../index.php?newpwd=passwordupdated");

    }


} else{

    header("Location: ../index.php");
} 


