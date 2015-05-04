<?php
require "require.php";
?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>L'asso</title>
	    <link href='http://fonts.googleapis.com/css?family=Rye' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Diplomata+SC' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/style-asso.css">
		<script src="jquery-1.3.2.min.js"></script>
		<script src="script.js"></script>
		<style>
		</style>
	</head>
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
                <li class="bouton_droite"><a href="login.php">
                        <a href="logout.php">
                            <img src="images/dcbutton.png" alt="paramètre"  VSPACE="5" HSPACE="5" Align="right" />
                        </a>
                        <a href="parametre.php">
                            <img src="images/iconeparam.png" alt="paramètre" VSPACE="5" HSPACE="5" Align="right" />
                        </a>
                </li>


            </ul>
        </div>
	<!-- Fin du menu horizontal */ -->	
			<div class="canvas">
				<h1>RockYourChance</h1>
				<p class="flotte">
				 	<img class="imgguitare" src="images/guitare.jpg"/>
				</p>
				<p>
				 	L’association RockYourChance  participe à l’organisation d’événements à Aix-en-Provence et développe des projets d’action culturelle en direction du jeune public.
					L’association donne de l’essor à la diffusion culturelle et l’accompagnement de la pratique amateur.
				</p>
			</div>
              <br /><br /><br /><br /><br /><br /><br /><br />



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
        </footer>
	</body>
</html>