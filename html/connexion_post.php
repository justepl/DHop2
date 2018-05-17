<?php
    session_start(); // demarage d'une session_cache_expire
if(isset($_POST['identifiant']) && isset($_POST['password'])) {
    require 'db.php';
    
    //recuperation de l'utilisateur depûis la bdd
    $resultat = $bd->prepare("SELECT * FROM membre WHERE pseudo=? AND password=?");
    $login = $_POST['identifiant'];
    $mdp = sha1($_POST['password']);
    $resultat->execute(array($login, $mdp));
    if ($resultat->rowCount() == 1) {
        $_SESSION['login'] = $login;
        $_SESSION['mdp'] = $mdp;
        
        // var qui indique que l'authentifiaction est reussi :
        $authOk = true;
    }
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Resultat de l'authentification</title>
</head>
    
<body>
    <h1>resultat de l'authentification</h1>
    <?php
        if (isset($authOk)) {
            echo "<p>Vous avez été reconnus en tant que" . $login . "</p>";
            echo '<a href="index.php"> Pourquivre vers la page d\'acceuil</a>';
        }
    else {
        ?>
        <p>Non reconnus</p>
    <?php
    }
    ?>
</body>
</html>