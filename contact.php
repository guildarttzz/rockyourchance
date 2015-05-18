<?php

require "require.php";
$message = null;
$contact = new Contact();
if(isset($_POST['nom']) && isset($_POST['nommembre']) && isset($_POST['email']) && isset($_POST['spe']) && isset($_POST['url'])){
    if(!$contact->setNomGrp($_POST['nom'])){
        $message = "Le groupe n\' a pas de nom";
    }elseif(!$contact->setNomMembre($_POST['nommembre'])){
        $message = "Il manque un ou plusieur nom(s) membre(s)";
    }elseif(!$contact->setEmail($_POST['email'])){
        $message = "Le groupe n\'a pas d\'email";
    }elseif(!$contact->setSpe($_POST['spe'])){
        $message = "Il manque une ou plusieur specialisation(s)";
    }elseif(!$contact->setSite($_POST['url'])){
        $message = "Le groupe n\'a pas de site";
    }elseif (!$contact->insert()) {
        $message = "Il y a un problème à l'insertion";
    }else{
        $message = "Votre inscription a bien été prise en compte";
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
    <h1>Incrivez-vous !</h1>
    <?php
        echo $message;
    ?>
    <form method="post" action="" enctype="multipart/form-data">
        <input type="text" name="nom" placeholder="Nom du groupe" /><br />
        <textarea name="nommembre" placeholder="nom des membres" cols="50" rows="10"></textarea><br />
        <input type="mail" name="email" placeholder="rentrer votrer email" /><br />
        <textarea name="spe" placeholder="spécialisations des membres" cols="50" rows="10"></textarea><br />
        <input type="text" name="url" placeholder="votre site web"></br />
        <input type="submit" name="creer" value="Créer"/>
    </form> 
</body>
    
</html>