<?php
require "require.php";
head("Login");
$alert = $email = null;
if(isset($_POST['pseudo']) && isset($_POST['password'])){
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];
    if (!Utilisateur::exist($pseudo)) {
        $alert = 'Le compte n\'existe pas.';
    }
    else{
        $u = new Utilisateur($pseudo);
        if(!$u->checkPassword($password)){
            $alert = "Le mot de passe et le nom d'utilisateur ne correspondent pas.";
        }else{
            $_SESSION['id'] = $u->getId();
            $alert = "Vous êtes connecté.";
            header('Location: index.php');
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