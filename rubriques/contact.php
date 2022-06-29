<?php
include_once "../includes/functions.inc.php";
include_once "../includes/parties.inc.php";
session_start();
timeout();

if(isset($_GET["message"])) {
    if(htmlspecialchars($_GET["message"]== "sent")) {
        function_alert('Message envoyé !'); 
    }
}
if(isset($_GET["error"])) {
    if(htmlspecialchars($_GET["error"]== "emptyinput")) {
        function_alert('Certains champs ne sont pas remplis'); 
    }
}
if(isset($_GET["checkbox"])) {
    if(htmlspecialchars($_GET["checkbox"]== "false")) {
        function_alert('Veuillez acceptez les conditions de services');    
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../content/contacts.css" />
    <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=CCbGNW_fa-r0WzLLRQdglA12s6jX5LHiCDAzV7smSkKkdRYVA8FOdgdZ7gm-l-UTB9RTTfGXkgwlF4XPHJWT7vtSf4RwCJ5_Y3GH0S4g_wK3KrcW4MFrx7q1o2AsR7xJZ4bih1YUHweaWksa-qbWmg" charset="UTF-8"></script><script src="https://kit.fontawesome.com/1d2e5bc245.js" crossorigin="anonymous"></script> 
    <link href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <title>Contactez-nous</title>
</head>
<body>
    <header>
        <?php 

        afficheNav($navAdmin, $navMembre, $nav);
        

        ?>
    </header>

<script>
  $(function() {
  $("#conditions").click(function(e) {
        e.preventDefault();
        $('#dialog').dialog('open');
    });

  $( "#dialog" ).dialog({
      resizable: true,
      height:600,
      modal: true,
      minWidth: 800,
      autoOpen:false,
    });
  });
</script>
    <div class="contact-container">
        <div class="contact-box">
            <div class="left-box">
                <h2>Contactez-nous</h2>
                <form action="../includes/contact.inc.php" method="POST">
                <input type="text" class="field" name = "prenom" placeholder="Prenom">
                <input type="text" class="field" name = "nom" placeholder="Nom">
                <input type="email" class="field" name = "email" placeholder="Email">
                <input type="text" class="field" name = "tel" placeholder="Téléphone">
                <textarea class="field area" name = "message" placeholder="Message"></textarea>
                <input id="agree" type="checkbox" class="agree-checkbox" name="agree-required">
                <label for="agree">J'accepte les <a href="" id = "conditions" >Conditions de services</a></label>
                <button class="btn" type="submit" name="contact">Envoyer</button>
                </form>
            </div>
            <div class="right-box"></div>
        </div>
       
    </div>
 
    <div id = "dialog" title = "Conditions de services">
  <!-- CONDITIONS DE SERVICES -->
  <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

</p>
    </div>
</body>

</html>
