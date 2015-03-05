<?php
require "require.php";
head("Register");


$alert = $email = null;

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['pseudo']) && isset($_POST['cemail']) && isset($_POST['cpassword'])) 
{
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $u = new Utilisateur($pseudo);

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
    elseif ($email != $_POST['cemail']) 
    {
        $alert = 'Les mails ne correspondent pas.';
    }
    elseif ($password != $_POST['cpassword']) 
    {
        $alert = 'Les mots de passes ne correspondent pas.';
    }
    elseif (Utilisateur::exist($email) || Utilisateur::exist($pseudo)) {
        $alert = 'Cet email ou ce pseudo est déjà utilisé.';
    }
    elseif (!$u->insert()) {$alert = 'Problème Insert';}
    else 
    {
        header('Location: index.php');
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
                <input type="submit" name="send" class="button expand info" value="Envoyer">
            </form>
        </div>
    </div>
</body>
</html>