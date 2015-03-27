<?php

require "require.php";

?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Galerie</title>
    <head>
        <title>RockYourCHance</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="css/style_index.css" type="text/css" media="screen"/>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script src="js/cufon-yui.js" type="text/javascript"></script>
		<script src="js/Note_this_400.font.js" type="text/javascript"></script>
   		<link href='http://fonts.googleapis.com/css?family=Rye' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Diplomata+SC' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/galerie.css">
		<script src="jquery-1.3.2.min.js"></script>
		<script src="js/galerie.js"></script>

    </head>

    <body>
	<div class="container">
		 <div class="containerHoriz">
		 	<ul id="menu_horizontal">
				<li class="bouton_gauche"><a href="index.php">
							<font color="black"><b>Accueil</b></font></a></li>
				<li class="bouton_gauche"><a href="Prog.php">
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
	</div>
	</div>
		<div id="pp_gallery" class="pp_gallery">
			
			<div id="pp_loading" class="pp_loading"></div>
			<div id="pp_next" class="pp_next"></div>
			<div id="pp_prev" class="pp_prev"></div>
			<div id="pp_thumbContainer">

				<div class="album">
					<div class="content">
						<img src="images/album1/thumbs/1.jpg" alt="images/album1/1.jpg" />
					</div>
					<div class="content">
						<img src="images/album1/thumbs/2.jpg" alt="images/album1/2.jpg" />
					</div>
					<div class="content">
						<img src="images/album1/thumbs/3.jpg" alt="images/album1/3.jpg" />
					</div>
					<div class="content">
						<img src="images/album1/thumbs/4.jpg" alt="images/album1/4.jpg" />
					</div>
					<div class="content">
						<img src="images/album1/thumbs/5.jpg" alt="images/album1/5.jpg" />
					</div>
					<div class="content">
						<img src="images/album1/thumbs/6.jpg" alt="images/album1/6.jpg" />
					</div>
					<div class="descr">
						ROCK
					</div>
				</div>

				<div class="album">
					<div class="content">
						<img src="images/album2/thumbs/1.jpg" alt="images/album2/1.jpg" />
					</div>
					<div class="content">
						<img src="images/album2/thumbs/2.jpg" alt="images/album2/2.jpg" />
					</div>
					<div class="content">
						<img src="images/album2/thumbs/3.jpg" alt="images/album2/3.jpg" />
					</div>
					<div class="content">
						<img src="images/album2/thumbs/4.jpg" alt="images/album2/4.jpg" />
					</div>
					<div class="content">
						<img src="images/album2/thumbs/5.jpg" alt="images/album2/5.jpg" />
					</div>
					<div class="content">
						<img src="images/album2/thumbs/6.jpg" alt="images/album2/6.jpg" />
					</div>
					<div class="descr">
						AGAINROCK
					</div>
				</div>

				<div id="pp_back" class="pp_back">Albums</div>
			</div>
		</div>
				<footer class="moncadre">
			<div class="container1">
				<div class="containerHoriz">
				 	<ul id="menu_horizontal">
						<li class="bouton_gauche"><a href="Plandusite.php">
									<font color="black"><b>Plan du Site</b></font></a></li>
						<li class="bouton_gauche"><a href="Prog.php">
									<font color="black"><b>Programmation</b></font></a></li>
						<li class="bouton_gauche"><a href="galerie.php">
									<font color="black"><b>Galerie</b></font></a></li>
						<li class="bouton_droite"><a href="l'asso.php">
									<font color="black"><b>L'Asso</b></font></a></li>
						<li class="bouton_droite"><a href="contact.php">
									<font color="black"><b>Contact</b></font></a></li>
					</ul>
				</div>
				<center>
					<a href="https://twitter.com/?lang=fr" title="Twitter"><img src="images/002.png"></a>
					<a href="https://www.facebook.com/" title="Facebook"><img src="images/3378 - Copie.png"></a>
					<p>Copyright &copy;2014 - 2015 RockYourChance PrivacyPolicy</p>
				</center>
			</div>
		</footer>
    </body>
</html>