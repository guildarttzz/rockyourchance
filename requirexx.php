<?php
session_start();
$db = mysqli_connect("localhost", "root", "9fkrTrByulxJ", "rockyourchance");
if (mysqli_connect_errno($db)) {
    var_dump("Echec lors de la connexion à MySQL as : " . mysqli_connect_error());
    die();
}
require "admin.class.php";
require "function.php";
require "evenement.class.php";


