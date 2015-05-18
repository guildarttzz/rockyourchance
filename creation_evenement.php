<?php

require "require.php";

$event = new Evenement();
if(isset($_POST['nom'])){
    if(!$event->setNomGrp($_POST['nom'])){
        echo "Le groupe n\' a pas de nom";
    }elseif (!$event->insert()) {
        echo "Il y a un problème à l'insertion";
    }else{
        header('Location: index.php');
    }
}


?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/contact.css">
<body>
    <div class="container">
        <div class="containerHoriz">
            <ul id="menu_horizontal">
                <li class="bouton_gauche"><a href="index.php">
                            <font color="black"><b>Accueil</b></font></a></li>
                <li class="bouton_gauche"><a href="programmation.php">
                            <font color="black"><b>Programmation</b></font></a></li>
                <li class="bouton_gauche"><a href="galerie.php">
                            <font color="black"><b>Galerie</b></font></a></li>
                <li class="bouton_droite"><a href="asso.php">
                            <font color="black"><b>L'Asso</b></font></a></li>
                <li class="bouton_droite"><a href="contact.php">
                            <font color="black"><b>Contact</b></font></a></li>
                <li class="bouton_droite"><a href="face.php">
                            <img src="images/iconeface.jpg" alt="Facebook" VSPACE="5" HSPACE="5" Align="center" /></a></li>
                <?php
switchMenu();
?>

                        <a href="deconexion.php">
                            <img src="images/dcbutton.png" alt="paramètre"  VSPACE="5" HSPACE="5" Align="right" />
                    </a></li>
                        <a href="parametre.php">
                            <img src="images/iconeparam.png" alt="paramètre" VSPACE="5" HSPACE="5" Align="right" />
                    </a>
                </li>
        
            </ul>
        </div><br />
    <h1>Créez un événement</h1>
    <form action="" method="post">
        <input type="text" name="nom" placeholder="Nom du groupe" />
        <input type="submit" name="creer" value="Creer"/>
    </form> 
</body>
    
</html>