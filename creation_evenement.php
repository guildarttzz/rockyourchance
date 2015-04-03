<?php

require "require.php";

$event = new Evenement();
if(isset($_POST['nom'])){
    if(!$event->setNomGrp($_POST['nom'])){
        echo "Le groupe n\' a pas de nom";
    }elseif (!$event->insert()) {
        echo "Il y a un problème à l'insertion";
    }else{
        header('Location: index.php');
    }
}


?>

<head>
    <meta charset="UTF-8">
<body>
    
    <form action="" method="post">
        <input type="text" name="nom" placeholder="Nom du groupe" />
        <input type="submit" name="creer" value="Creer"/>
    </form> 
</body>
    
</html>