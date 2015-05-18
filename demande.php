<?php
require "require.php";

$contact = new Contact($_GET['contact']);
if(isset($_GET['contact']) && isset($_POST['nomgrp']) && isset($_POST['nommembre']) && isset($_POST['email'])
     && isset($_POST['spe']) && isset($_POST['url'])){
    $contact->setNomGrp($_POST['nomgrp']);
    $contact->setNomMembre($_POST['nommembre']);
    $contact->setEmail($_POST['email']);
    $contact->setSpe($_POST['spe']);
    $contact->setSite($_POST['url']);
    $contact->updateContact();
    
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Modifications</title>
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

                        <a href="logout.php">
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
        </div>

        <form action="" method="post">

        <?php
            echo '<input type="text" name="nomgrp" value="'. $contact->getNomGrp() .'"><br />
                  <textarea name="nommembre" cols="50" rows="10">'.$contact->getNomMembre().'</textarea><br />
                  <input type="mail" name="email" value="'.$contact->getEmail().'" /><br />
                  <textarea name="spe" cols="50" rows="10">'.$contact->getSpe().'</textarea><br />
                  <input type="text" name="url" value="'.$contact->getSite().'"></br />
                  <input type="submit" name="valider" value="Valider les changements"/>
                ';
        ?>