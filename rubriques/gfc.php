<?php
include_once "../includes/parties.inc.php";
include_once "../includes/functions.inc.php";
include_once "../includes/affichetab.inc.php";
session_start();
timeout();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GFC PHARMA</title>
    <link rel="stylesheet" href="../content/gfc.css" />
    <script src="https://kit.fontawesome.com/1d2e5bc245.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="aos-by-red.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>
    <header>
            <?php 

            afficheNav($navAdmin, $navMembre, $nav);

            ?>
    </header>

    <main class="main-content">
        <div class="header-bottom">

            <div class="left-box">
                <h1>Qui Sommes-nous ?</h1>
            </div>
            <div class="rights-box">
                <img src='../content/images/ph.jpg' class="img_ph">
            </div>
        </div>

        <!-- TITRES AVEC PARAGRAPHES -->


        <div class="gfc-content">

            <div class="gfc-box">
                <div class="gfc-box-content" data-aos="zoom-in">

                    

                    <h2>Lorem ipsum dolor sit amet.</h2>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. A facilis, vero repellat voluptates
                        sint animi.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat incidunt hic commodi. Itaque,
                        sed unde rerum debitis saepe veritatis tenetur aut quae quis magni suscipit, dolores voluptatum!
                        Odit, nesciunt mollitia?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente, pariatur. Impedit, iste
                        voluptatibus, perferendis beatae exercitationem sed labore recusandae excepturi nobis
                        reprehenderit voluptas, illo cupiditate tempore! Quidem quis odio repellendus sunt quia,
                        perspiciatis deserunt quasi quo ullam laborum ratione, error temporibus officiis saepe ea et
                        illum minima? Corporis natus ut impedit excepturi odio dolorem commodi sapiente itaque. Dolorem,
                        aliquid eveniet.</p>
                    <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi delectus magnam nemo
                        consequatur nobis magni qui, libero quaerat? Nulla animi illum in reprehenderit necessitatibus
                        incidunt iusto sed maxime ex deserunt?</P>
                </div>
            </div>

        </div>
        <div class="about-next1">

            <div class="about-next-top1">
                <div class="about-next-left-box1" >
                    <img src='../content/images/ph.jpg' class="img_ph">
                </div>
                <div class="about-next-right-box1" data-aos="fade-up" data-aos-duration="1000">
                    <h1>Lorem ipsum dolor sit amet.</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. A facilis, vero repellat voluptates
                        sint animi.</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. A facilis, vero repellat voluptates
                        sint animi.</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. A facilis, vero repellat voluptates
                        sint animi.</p>
                </div>
            </div>

        </div>
        

        <div class="about-next">

            <div class="about-next-top">
                <div class="about-next-left-box" data-aos="fade-up" data-aos-duration="1000">
                    <h1>Lorem ipsum dolor sit amet.</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. A facilis, vero repellat voluptates
                        sint animi.</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. A facilis, vero repellat voluptates
                        sint animi.</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. A facilis, vero repellat voluptates
                        sint animi.</p>
                </div>
                <div class="about-next-right-box">
                    <img src='../content/images/ph.jpg' class="img_ph">
                </div>
            </div>

        </div>

        <!-- PRESENTATION DES MEMBRES -->

        <div class="membres" data-aos="fade-up" data-aos-duration="2000">

            <div class="title-membres">
                <h2>Nos Membres</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Esse culpa aut quam. Dolor vero quisquam
                    sunt impedit ipsa explicabo tempore?</p>
            </div>
            <div class="liste-membres">
            <?php

                afficheMembres();

            ?>
            </div>
        </div>

        <!-- PRESENTATION DES PARTENAIRES -->

        <section>
            <div class="title-partenaires">
                <h2>Nos partenaires</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Esse culpa aut quam. Dolor vero quisquam
                    sunt impedit ipsa explicabo tempore?</p>
            </div>
            
            <div class="swiper mySwiper partenaires-container">
                <div class="swiper-wrapper content">
                    <?php
                        afficheLabos()
                    ?>
                </div>
            </div
        </section>
    </main>

    <footer>
        <div class="footer">
              
            <div class="img">
                    <img src="../content/images/Logo-GFC-Pharma-removebg-preview.png" alt="" class="imag">
                </div>
           
            <div class="Navigation">
                <aside>
                    <h4>Navigation</h4>
                </aside>
                <div class="text">
                   
                    <p> <a  href="../index.php">Accueil</a></p>
                    <p> <a href="contact.php">Conctact</a></p>
                    <p> <a href="gfc.php">Qui sommes-nous ? </a></p>
                    <p> <a href="tdb.php" class="aaa">Espace pharmacien</a></p>
                    <p> <a href="newsinscription.php">Newsletter</a></p>
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

    
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 3000,
        });
    </script>
</body>

</html>