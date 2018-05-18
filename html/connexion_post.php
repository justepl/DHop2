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
            $_SESSION['authOK'] = true;
            header('Location : index.php');
        }
    }
?>