<?php
    include_once "includes/functions.inc.php";
    include_once "includes/parties.inc.php";
    include_once "includes/afficheActu.inc.php";
    
    session_start();
    if(isset($_SESSION["id"])) {
        timeout();
        
    }
    if(isset($_GET["follow"])) {
        if(htmlspecialchars($_GET["follow"]== "true")) {
           
            function_alert("Vous êtes inscrit à la newsletter.");
        }
    }

    if(isset($_GET["newpwd"])) {
        if(htmlspecialchars($_GET["newpwd"]== "passwordupdated")) {
           
            function_alert("Votre mot de passe a été mis à jour.");
        }
    }
    if(isset($_GET["session"])) {
        if(htmlspecialchars($_GET["session"]== "expired")) {
           
            function_alert("Votre session a expiré.");
        }
    }
    if(isset($_GET["error"])) {
        if(htmlspecialchars($_GET["error"]== "stmtfailed")) {
           
            function_alert("Erreur avec la base de données.");
        }
        if(htmlspecialchars($_GET["error"]== "notfound")) {
           
            function_alert("Information non trouvée dans la base de données.");
        }
    }
?>


<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="content/style.css" />
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=3PAPD7Z9BsJ4tQDfNaVgSPa8oIIXGvws9aqKqHAC8-VaTZHRpI4rjQg7pH0CZsftcx3IDSAf91xjIyvv-4SKhBb42Gz11eYaqtWvCZsGCfHhW9a8exmfQjejYKPdOp-51sKxmCNGYRr1lfDctY_9Pw" charset="UTF-8"></script></head>
<body>
         
        <nav>
        <a href="accueil.html" class="logo"><img src="content/images/Logo-GFC-Pharma.jpg" width="100" height="70"></a>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
        <i class="fa-solid fa-bars bars"></i>
        </label>
        <ul class = "menu">
        <li> <a href = "index.php">ACCUEIL</a></li>
        <li> <a href = "rubriques/contact.php">CONTACT</a></li>
        <li> <a href = "rubriques/gfc.php">GFC PHARMA</a></li>
        <?php
        if(isset($_SESSION["id"])) {
            if($_SESSION["isActif"]==1){
                echo ' <li> <a href = "rubriques/tdb.php">ESPACE PHARMACIEN</a></li>';
            }
            if($_SESSION["isAdmin"]==1){
                echo '<li> <a href = "rubriques/ajoutmembre.php">ADMINISTRATION</a></li>';
            }
        }
        ?>
        

        <?php
            if(isset($_SESSION["id"])) {
                echo '
                <form action="includes/logout.inc.php" method="POST">
                    <input class="btn" type="submit" name="deconnexion" value="Deconnexion">
                </form>';
                
            }else{
                echo '<a href="rubriques/connect.php" class="btn">Connexion</a>';
            }
        ?>  
        </ul>             
        </nav>

        <section class = "accueil-container" id="accueil">
            <div class = "div_img_phg" >
                <img src='content/images/ph.jpg' class="img_ph" width="400" height="400">
                
             </div>
        </section>
            <main class="main-content">
         <section class="main2">
            <div class="d2">
                <h3 class="titlea">GFC PHARMA</h1>
                
                <!-- PRESENTATION -->

                <p class = "pa"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </section>
          <!--------------- actualite ------------------->  
          <?php
           afficheActu();
           ?>
 
    </main>
       
    <footer>
        <div class="footer">
              
            <div class="img">
                    <img src="content/images/Logo-GFC-Pharma-removebg-preview.png" alt="" class="imag">
                </div>
           
            <div class="Navigation">
                <aside>
                    <h4>Navigation</h4>
                </aside>
                <div class="text">
                   
                    <p> <a  href="index.php">Accueil</a></p>
                    <p> <a href="rubriques/contact.php">Conctact</a></p>
                    <p> <a href="rubriques/gfc.php">Qui sommes-nous ? </a></p>
                    <p> <a href="rubriques/tdb.php" class="aaa">Espace pharmacien</a></p>
                    <p> <a href="rubriques/newsinscription.php">Newsletter</a></p>
                </div>

            </div>

            <!-- COORDONNEES -->
            
            <div class="Coordonnees">
                <aside>
                    <h4>Coordonnées</h4>
                </aside>
                <div class="text">
                    <p> 1 PROMENADE DU BELVEDERE - 77200 - Torcy</p>
                    <p> gfcpharma.coop@gmail.com</p>
                    <p> TEL : +33 0 00 00 00 00</p>
                    <p>  FAX : +33 0 00 00 00 00</p>
                </div>
            </div>
            <div class="Credits">
                <aside>
                    <h4>Crédits</h4>
                </aside>
                <div class="text">
                    <p> <a href="">Mentions légales</a></p>
                    <p> <a href="">GFC Pharma Coopérative</a></p>
                </div>
            </div>


        </div>


    </footer>

     
    </body>
</html>