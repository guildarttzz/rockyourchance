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


function switchMenu()
{
    $u = isset($_SESSION['id'])? new Utilisateur($_SESSION['id']):new Utilisateur();
    if (isConnected()) {
        echo 'Bonjour '.$u->getPseudo();
    }else{
        echo '
            <li><a  style=\"color:#000\" href="login.php">Connexion</a>
            </li>
        ';
    }
}

function checkPassword($pswd = null) 
{
    if (is_null($pswd)) return false;
    if (!preg_match("#^[\w\.\#\-\s]{6,}$#", $pswd)) 
    {
        return false;
    }
    return true;
}

function have_log(){
    if(!isset($GLOBALS['_messages'])) return false;

    global $_messages;
    if(!empty($_messages)) return true;
    return false;
}

function _sha4($str){
    return hash('sha256', $str);
}

/**
 *  Add an error to log messages
 *
 *  @param string $log logs
 *  @param string $message the error message
 *  @since 0.1
 */
function add_error(&$log, $message){
    if(!is_array($log)) return;

    $log[] = array(
        "type" => "error",
        "message" => $message
    );
}

/**
 *  Add a success to log messages
 *
 *  @param string $log logs
 *  @param string $message the error message
 *  @since 0.1
 */
function add_success(&$log, $message){
    if(!is_array($log)) return;

    $log[] = array(
        "type" => "success",
        "message" => $message
    );
}

function form_signup($post){
    $a = array(
        'signup_nick' => 'checkNickname'
        , 'signup_mail' => 'checkEmail'
    );

    return _form($post, $a);
}


function _form($post, $verif){
    foreach ($verif as $k => $v) {
        if(!isset($post[$k])) return false;
        if((function_exists($v) 
                && $v($post[$k]))
            || preg_match("#$v#", $post[$k])
        ){
            continue;
        }else{
            var_dump($post[$k]);
            return false;
        }
    }
    return true;
}
