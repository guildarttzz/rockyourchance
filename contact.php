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
            <ul class="menu-deroulant">
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Programmation</a></li>
                    <li><a href="#">Galerie</a></li>
                    <li><a href="#">L'asso</a></li>
                    <li><a href="#">Contact</a></li>

                </ul>
            </ul>
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
        <div class="textcontactgrand">
        <form  method="post" action="" enctype="multipart/form-data">
            <input type="text" name="nom" placeholder="Nom du groupe" /><br />
            <textarea name="nommembre" placeholder="nom des membres" cols="50" rows="10"></textarea><br />
            <input type="mail" name="email" placeholder="rentrer votrer email" /><br />
            <textarea name="spe" placeholder="spécialisations des membres" cols="50" rows="10"></textarea><br />
            <input type="text" name="url" placeholder="votre site web"></br />
            <input type="submit" name="creer" value="Créer"/>
        </form>
        </div>
        <div style="height:200px;display:block;"> </div>
        <footer class="moncadre">
            <div class="container1">
                <div class="containerHoriz">
                    <ul id="menu_horizontal">
                        <li class="bouton_gauche"><a href="Plandusite.php">
                                <font color="black"><b>Plan du Site</b></font></a></li>
                        <li class="bouton_gauche"><a href="programmation.php">
                                <font color="black"><b>Programmation</b></font></a></li>
                        <li class="bouton_gauche"><a href="galerie.php">
                                <font color="black"><b>Galerie</b></font></a></li>
                        <li class="bouton_droite"><a href="asso.php">
                                <font color="black"><b>L'Asso</b></font></a></li>
                        <li class="bouton_droite"><a href="contact.php">
                                <font color="black"><b>Contact</b></font></a></li>
                    </ul>

                    <div class="containerHoriz">


                        <a href="https://twitter.com/?lang=fr" title="Twitter"><img src="images/002.png"></a>
                        <a href="https://www.facebook.com/" title="Facebook"><img src="images/3378 - Copie.png"></a></br>
                        <div class="containerHoriz">
                            Copyright &copy;2014 - 2015 RockYourChance PrivacyPolicy
                        </div>
                    </div>

                </div>
                </div>
        </footer>
</body>
</html>