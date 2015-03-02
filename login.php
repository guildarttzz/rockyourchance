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
if(isset($_POST['pseudo']) && isset($_POST['password'])){
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];
    if (!Administrateur::exist($pseudo)) {
        $alert = 'Le compte n\'existe pas.';
    }
    else{
        $u = new Administrateur($pseudo);
        if(!$u->checkPassword($password)){
            $alert = "Le mot de passe et le nom d'utilisateur ne correspondent pas.";
        }else{
            //$_SESSION['id'] = $u->getId();
            $alert = "Vous êtes connecté.";
            header('Location: index.html');
        }
    }
}
?>
    <div class="row form">
        <div class="col range-6">
            <h2>Login</h2>
            <?php echo $alert;?>
            <form action="" method="POST">
                <input type="text" name="pseudo" placeholder="Pseudo">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" name="send" class="button expand info" value="Connexion">
            </form>
        </div>
    </div>
</body>
</html>
