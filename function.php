<?php
function isConnected()
{
    if (!isset($_SESSION['id'])) {
        return false;
    }
    return true;
}

function verifMail($mail)
{
    if (!preg_match("#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,4}$#", $mail)){
        return false;
    }
    return true;
}

function verifInt($int)
{
    if(!preg_match("#^[0-9]{1,1000}$#", $int)){
        return false;
    }
    return true;
}

function verifName($name)
{
    if (!preg_match("#^[\w\.\#\-\s]{5,}$#", $name)) 
    {
        return false;
    }
    return true;
}

function head($title)
{
    echo '
        <!DOCTYPE HTML>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>'.$title.'</title>
            <link rel="stylesheet" href="css/style.css">
            <script type="text/javascript" src="js/jquery.js"></script>
            <script type="text/javascript" src="js/leaframe.js"></script>
        </head>
    ';
}
