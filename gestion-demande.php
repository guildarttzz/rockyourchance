<?php
require "require.php";
if (isset($_GET['trashed']))
{
    
    Contact::_deleteContact($_GET['contact']);
    header("gestion-demande.php");
}
?>
<head>
    <meta charset="utf-8">
    <title>Modifications</title>
    <link href='http://fonts.googleapis.com/css?family=Rye' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Diplomata+SC' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="css/programmation.css">
            <link rel="stylesheet" type="text/css" href="css/leaframe.css">
            <link rel="stylesheet" type="text/css" href="css/leaframe.min.css">
            <script src="jquery.js"></script>
            <script type="text/javascript" src="js/leaframe.min.js"></script>
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
            <div class="row">
                <table class="dif">
                    <thead>
                        <tr>
                            <th>Nom du groupe</th>
                            <th>Membres</th>
                            <th>Email</th>
                            <th>Spécialisation</th>
                            <th>Site</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (Contact::_getContact() as $v)
                        {
                            echo "
                                    <tr>
                                            <td>
                                                    ".$v['nom_grp']."
                                            </td>
                                            <td>
                                                    ".$v['nom_membre']."
                                            </td>
                                            <td>
                                                    ".$v['email']."
                                            </td>
                                            <td>
                                                    ".$v['spe']."
                                            </td>
                                            <td>
                                                    ".$v['site']."
                                            </td>
                                            <td>
                                                <a class=\"button info rounded\" href=\"demande.php?contact=" . $v['id_contact'] . "\">Modifier</a>
                                        </td>
                                        <td>
                                                <a id='supprimer_article_" . $v['id_contact'] . "'
                                                    class=\"supprimerDemande button error rounded\"
                                                    href=\"gestion-demande.php?contact=" . $v['id_contact'] . "&trashed=true\">Supprimer
                                                </a>
                                        </td>
                                </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>