<?php
    session_start(); // demarage d'une session_cache_expire

    if(isset($_POST['identifiant']) AND isset($_POST['password'])) {
        require 'db.php';

        //recuperation de l'utilisateur depûis la bdd
        $resultat = $bd->query("SELECT * FROM membre");
        
        while ($donne_co = $resultat->fetch()) {
          if ($donne_co['pseudo'] == $_POST['identifiant'] AND $donne_co['password'] == sha1($_POST['password'])) {
              $_SESSION['identifiant'] = $_POST['identifiant'];
              $_SESSION['id_vendeur'] = $donne_co['id'];
              $_SESSION['connect'] = 1;
          }  
        }
        /*$login = $_POST['identifiant'];
        $mdp = sha1($_POST['password']);
        $resultat->execute(array($login, $mdp));
        if ($resultat->rowCount() == 1) {
            $_SESSION['login'] = $login;
            $_SESSION['mdp'] = $mdp;
            // var qui indique que l'authentifiaction est reussi :
            $_SESSION['authOK'] = true;*/
            header('Location : index.php');
        }
?>