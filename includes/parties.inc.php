<?php


/*******************************************Pour fichiers dans rubirques  ********************************/

$footer = '<footer>
   
<ul class = "menu_footer">
    <li> <a href = "../index.php">ACCUEIL</a></li>
    <li> <a href = "contact.php">CONTACT</a></li>
    <li> <a href = "gfc.php">GFC PHARMA</a></li>
    <li> <a href = "">Mention légales</a></li>
</ul>
</footer>
';



$nav= '<nav>
<a href="../index.php" class="logo"><img src="../content/images/Logo-GFC-Pharma.jpg" width="100" height="70"></a>
<input type="checkbox" id="check">
<label for="check" class="checkbtn">
    <i class="fa-solid fa-bars bars"></i>
</label>
<ul class="menu">
    <li> <a href="../index.php">ACCUEIL</a></li>
    <li> <a href="contact.php">CONTACT</a></li>
    <li> <a href="gfc.php">GFC PHARMA</a></li>
    <li>  <a href="connect.php" class="btn">Se Connecter</a></li>
</ul>
</nav>';

$navAdmin= '<nav>
<a href="../index.php" class="logo"><img src="../content/images/Logo-GFC-Pharma.jpg" width="100" height="70"></a>
<input type="checkbox" id="check">
<label for="check" class="checkbtn">
    <i class="fa-solid fa-bars bars"></i>
</label>
<ul class="menu">
    <li> <a href="../index.php">ACCUEIL</a></li>
    <li> <a href="contact.php">CONTACT</a></li>
    <li> <a href="gfc.php">GFC PHARMA</a></li>
    <li> <a href="tdb.php" class="aaa">ESPACE PHARMACIEN</a></li>
    <li> <a href= "ajoutmembre.php" class="admin">ADMINISTRATION</a></li>
    <li>  <form action="../includes/logout.inc.php" method="POST">
    <input type="submit" class = "btn" name="submit" value="Deconnexion">
</form></li>
    
</ul>
</nav>';

$navMembre= '<nav>
<a href="../index.php" class="logo"><img src="../content/images/Logo-GFC-Pharma.jpg" width="100" height="70"></a>
<input type="checkbox" id="check">
<label for="check" class="checkbtn">
    <i class="fa-solid fa-bars bars"></i>
</label>

<ul class="menu">
    <li> <a href="../index.php">ACCUEIL</a></li>
    <li> <a href="contact.php">CONTACT</a></li>
    <li> <a href="gfc.php">GFC PHARMA</a></li>
    <li> <a href="tdb.php" class="aaa">ESPACE PHARMACIEN</a></li>
    <li>  <form action="../includes/logout.inc.php" method="POST">
    <input type="submit" class = "btn" name="submit" value="Deconnexion">
</form></li>
    
</ul>
</nav>
';

?>