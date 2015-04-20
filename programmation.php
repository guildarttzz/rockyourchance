<?php
require "require.php";
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Programmation</title>
    <link href='http://fonts.googleapis.com/css?family=Rye' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Diplomata+SC' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/programmation.css">
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

						<a href="deconexion.php">
							<img src="images/dcbutton.png" alt="paramètre"  VSPACE="5" HSPACE="5" Align="right" />
					</a></li>
						<a href="parametre.php">
							<img src="images/iconeparam.png" alt="paramètre" VSPACE="5" HSPACE="5" Align="right" />
					</a>
				</li>
		
			</ul>
		</div>
		<div id="Divhaut">
		<p>
			<h1>
			RockYourChance
			</h1>	
		</p>
<br />
		<span id="textpetit">
			<p> Culture Hard rock
			</p>
		</span>
<br />
	<div class="tableau">
			<p class="Textevent">Evènements à venir
			</p>
		<table class="tablhaut">
			<tr>
				<th class="lignetable">nom du groupe</th>
				<th class="lignetable">horaire</th>
			</tr>
			
				<?php
foreach (Evenement::_getEvent() as $v) 
{
	echo 	"<tr>
				<td class=\"lignetable\">" . $v['nom_grp']."</td>",
				"<td class=\"lignetable\">".$v['date_event'] . "<br /></td>
			</tr>";
}
?>
			</tr>
		</table>
	</div>			
		
		
	</div>
<br />
<br />
<br />
	<div class="tableau">
			<p class="Textevent">Evènements précédent
			</p>
		<table class="tablhaut">
			<tr>
				<td class="lignetable">colonne 1 de la ligne 1</td>
				<td class="lignetable">colonne 2 de la ligne 1</td>
				<td class="lignetable1">colonne 3 de la ligne 1</td>
			</tr>
			<tr>
				<td class="lignetable">colonne 1 de la ligne 2</td>
				<td class="lignetable">colonne 2 de la ligne 2</td>
				<td class="lignetable1">colonne 3 de la ligne 2</td>
			</tr>
		</table>
	</div>		
		
		

		
		

		<footer id="moncadre">
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