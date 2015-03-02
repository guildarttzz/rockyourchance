<?php
session_start();
$db = mysqli_connect("127.0.0.1", "root", "", "rock");
if (mysqli_connect_errno($db)) {
    var_dump("Echec lors de la connexion à MySQL : " . mysqli_connect_error());
    die();
}
//head("Register");
require "admin.class.php";
$alert = $email = null;

if (isset($_POST['adresse']) && isset($_POST['email']) && isset($_POST['numtel']) && isset($_POST['password'])  && isset($_POST['comptefb'])&& isset($_POST['pseudo']) && isset($_POST['cemail']) && isset($_POST['cpassword'])) 
{
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $adresse = $_POST['adresse'];
    $numtel = $_POST['numtel'];
    $comptefb = $_POST['comptefb'];
    
    $u = new Administrateur($email, $pseudo, $password, $adresse, $numtel, $comptefb);

    if (!$u->setEmail($email))
    {
        $alert = 'Le mail n\'est pas conforme.';
    }
    elseif (!$u->setPseudo($pseudo))
    {
        $alert = 'Le pseudo n\'est pas conforme.';        
    }
    elseif (!$u->setPassword($password))
    {
        $alert = 'Le mot de passe n\'est pas conforme.';
    }
    elseif (!$u->setAdresse($adresse)) {
        $alert = 'l\'adresse n\'est pas valide';
    }
    elseif (!$u->setNumTel($numtel)) {
        $alert = 'Le numéro de téléphone n\' est pas valide ';
    }
    elseif (!$u->setCompteFb($comptefb)) {
        $alert = 'Le compte facebook n\' est pas valide';
    }
    elseif ($email != $_POST['cemail']) 
    {
        $alert = 'Les mails ne correspondent pas.';
    }
    elseif ($password != $_POST['cpassword']) 
    {
        $alert = 'Les mots de passes ne correspondent pas.';
    }
    elseif (Administrateur::exist($email) || Administrateur::exist($pseudo)) {
        $alert = 'Cet email ou ce pseudo est déjà utilisé.';
    }
    elseif (!$u->insert()) {$alert = 'Problème Insert';}
    else 
    {
        header('Location: index.html');
    }
}
?>
<body>
    <div class="row form">
        <div class="col range-6">
        <h2>Register</h2>
            <?php echo $alert ?>
            <form action="" method="POST">
                <input type="text" name="pseudo" placeholder="Pseudo">
                <input type="text" name="email" placeholder="E-Mail">
                <input type="text" name="cemail" placeholder="Confirmation E-Mail">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="cpassword" placeholder="Confirmation Password">
                <input type="text" name="adresse" placeholder="Votre adresse">
                <input type="tel" name="numtel" placeholder="Votre numero de tel">
                <input type="url" name="comptefb" placeholder="Votre facebook">
                <input type="submit" name="send" class="button expand info" value="Envoyer">
            </form>
        </div>
    </div>
</body>
</html>
