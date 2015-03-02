<?php
session_start();
$db = mysqli_connect("127.0.0.1", "root", "", "rock");
if (mysqli_connect_errno($db)) {
    var_dump("Echec lors de la connexion à MySQL : " . mysqli_connect_error());
    die();
}

require "admin.class.php";
require "function.php";

