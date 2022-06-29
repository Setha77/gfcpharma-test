<?php
    

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

function sendmdp($email, $mdp){
    


    $mail = new PHPMailer(true);

    try {
                        
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'noreply.gfc@gmail.com';                     
        $mail->Password   = 'adressedeMRCHY2022';                               
        $mail->SMTPSecure = 'ssl';             
        $mail->Port       = 465;                                   

        
        $mail->setFrom('noreply.gfc@gmail.com', 'GFC-Pharma');
        $mail->addAddress($email, 'hello');    
        $mail->addReplyTo('noreply.gfc@gmail.com', 'Information');


        
        $mail->isHTML(true);                                  
        $mail->Body    = $mdp;
        $mail->AltBody = $mdp;

        $mail->send();
        
    } catch (Exception $e) {
        header("location: ../rubriques/creermembre.php?error=mailcouldnotbesent");
    }
}


function sendMessage($message,$tel,$email,$nom,$prenom){
    
    $mail = new PHPMailer(true);

    try {
                        
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'noreply.gfc@gmail.com';                     
        $mail->Password   = 'adressedeMRCHY2022';                               
        $mail->SMTPSecure = 'ssl';             
        $mail->Port       = 465;                                   

        
        $mail->setFrom('noreply.gfc@gmail.com', 'GFC-Pharma');
        $mail->addAddress('thesupremedalek63@gmail.com', 'hello');     
        $mail->addReplyTo('noreply.gfc@gmail.com', 'Information');


        
        $mail->isHTML(true);                                  
        $mail->Body    = "<p>Message de la part de : ".$prenom. " ".$nom." :</p></br><p>".$message."</p></br><p> Adresse Mail : ".$email." , Téléphone : ".$tel."</p>";
        //$mail->AltBody = $;

        $mail->send();
        
    } catch (Exception $e) {
        header("location: ../rubriques/contact.php?error=mailcouldnotbesent");
    }
}


/*******************************************************A terminé  ****************************/


function sendreset($url, $email){
    
    $mail = new PHPMailer(true);

    try {
                        
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'noreply.gfc@gmail.com';                     
        $mail->Password   = 'adressedeMRCHY2022';                               
        $mail->SMTPSecure = 'ssl';             
        $mail->Port       = 465;                                   

        
        $mail->setFrom('noreply.gfc@gmail.com', 'GFC-Pharma');
        $mail->addAddress($email, 'hello');    
        $mail->addReplyTo('noreply.gfc@gmail.com', 'Information');


        
        $mail->isHTML(true);                                  
        $mail->Body    = '<p> Lien pour réinitialiser votre mot de passe : </br> </p> <a href="' .$url. '">' .$url . '</a></p>';

        $mail->send();
        
    } catch (Exception $e) {
        header("location: ../rubriques/contact.php?error=mailcouldnotbesent");
    }
}


function sendNewsletter($body,$email,$img){
    
    $mail = new PHPMailer(true);

    try {
                        
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'noreply.gfc@gmail.com';                     
        $mail->Password   = 'adressedeMRCHY2022';                               
        $mail->SMTPSecure = 'ssl';             
        $mail->Port       = 465;                                   

        
        $mail->setFrom('noreply.gfc@gmail.com', 'GFC-Pharma');
        $mail->addAddress($email, 'hello');    
        $mail->addReplyTo('noreply.gfc@gmail.com', 'Information');


        
        $mail->isHTML(true);
        $mail-> AddEmbeddedImage('../content/images/Logo-GFC-Pharma.jpg', 'logo');
        $mail-> AddEmbeddedImage('../content/newsletter/'.$img.'', 'image');                                  
        $mail->Body    = $body;
        //$mail->AltBody = $;

        $mail->send();
        
    } catch (Exception $e) {
        header("location: ../rubriques/contact.php?error=mailcouldnotbesent");
    }
}


?>




