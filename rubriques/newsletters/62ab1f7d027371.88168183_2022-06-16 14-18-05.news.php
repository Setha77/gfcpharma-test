

            <?php
            include_once "../../includes/parties.inc.php";
            include_once "../../includes/functions.inc.php";
            session_start();
            timeout();
            ?>

            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">      
                <meta http-equiv="X-UA-Compatible" content="IE=edge">           
                <meta name="viewport" content="width=device-width, initial-scale=1.0">      
                <link rel="stylesheet" href="../../content/newsletterSite.css">            
                <title>Newsletter publique</title>                          
            </head>                                 
            <body>
                <header>
                <nav>
                    <a href="../../index.php" class="logo"><img src="../../content/images/Logo-GFC-Pharma.jpg" width="100" height="70"></a>
                    <input type="checkbox" id="check">
                    <label for="check" class="checkbtn">
                    <i class="fa-solid fa-bars bars"></i>
                    </label>
                    <ul class = "menu">
                    <li> <a href = "../../index.php">ACCUEIL</a></li>
                    <li> <a href = "../../rubriques/contact.php">CONTACT</a></li>
                    <li> <a href = "../../rubriques/gfc.php">GFC PHARMA</a></li>
                    <?php
                    if(isset($_SESSION["id"])) {
                        if($_SESSION["isActif"]==1){
                            echo " <li> <a href = ../../rubriques/tdb.php>ESPACE PHARMACIEN</a></li>";
                        }
                        if($_SESSION["isAdmin"]==1){
                            echo "<li> <a href = ../../rubriques/ajoutmembre.php>ADMINISTRATION</a></li>";
                        }
                    }
                    ?>
                    
            
                    <?php
                        if(isset($_SESSION["id"])) {
                            echo "
                            <form action=../../includes/logout.inc.php method=POST>
                                <input class=btn type=submit name=deconnexion value=Deconnexion>
                            </form>";
                            
                        }else{
                            echo "<a href=../../rubriques/connect.php class=btn>Connexion</a>";
                        }
                    ?>  
                    </ul>             
                </nav>
                </header>
                <main class="main-page">
                    <div id="wrapper">
                        <h1>azert</h1>
                        <div class="banner" >
                            <img src="../../content/images/medecine-banniere-de-pharmacie-medicaments-et-fond-pilules-illustration-vecteur-125966392.jpg"  height="300" alt="">
                        </div>
                    </div>

                    <div class="one-col">
                        <p>
                            Bonjour
                        </p>
                    </div>
                </main>
                <footer>
                    <div class="footer">
                        
                        <div class="img">
                                <img src="img/Logo-GFC-Pharma-removebg-preview.png" alt="" class="imag">
                            </div>
                    
                        <div class="Navigation">
                            <aside>
                                <h4>Navigation</h4>
                            </aside>
                            <div class="text">
                                <p> <a  href="accueil.html">Accueil</a></p>
                                <p> <a href="contact.html">Conctact</a></p>
                                <p> <a href="gfc.html">Qui sommes-nous ? </a></p>
                                <p> <a href="tdb.html" class="aaa">Espace pharmacien</a></p>
                                <p> <a href="newsinscription.html">Newsletter</a></p>
                            </div>

                        </div>
                        <div class="Coordonnees">
                            <aside>
                                <h4>Coordonn??es</h4>
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
                                <h4>Cr??dits</h4>
                            </aside>
                            <div class="text">
                                <p> <a href="">Mentions l??gales</a></p>
                                <p> <a href="">GFC Pharma Coop??rative</a></p>
                            </div>
                        </div>
                    </div>
                </footer>
            </body>
            </html>