<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> test bdd</title>
</head>

<body>
    
</body>

<?php
            //echo($_POST['nom']);
        
            require 'db.php'; // inclu le fichier de co à la bd
                  
                  //securitée :
        if(isset($_POST['pseudo']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['sexe']) && isset($_POST['email']) && isset($_POST['password1']) && isset($_POST['password2'])) {
            $pseudo = addslashes(htmlspecialchars(htmlentities(trim($_POST['pseudo']))));
            $nom = addslashes(htmlspecialchars(htmlentities(trim($_POST['nom']))));
            $prenom = addslashes(htmlspecialchars(htmlentities(trim($_POST['prenom']))));
            $sexe = $_POST['sexe'];
            $email = addslashes(htmlspecialchars(htmlentities(trim($_POST['email']))));
            $password = sha1($_POST['password1']);
            $password_confirm = sha1($_POST['password2']);
            
            if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$email)) {// verif du format de l'adresse mail 
                
                if($password == $password_confirm) { // verifi que les deux mdp sont identiques
                
                $req = $bd->prepare('INSERT INTO membre(pseudo, nom, prenom, mail, password, sexe) VALUES(:pseudo, :nom, :prenom, :mail, :password, :sexe)');
                $req->execute(array(
                'pseudo' => $pseudo,
                'nom' => $nom,
                'prenom' => $prenom,
                'mail' => $email,
                'password' => $password,
                'sexe' => $sexe
                    ));
                } else {
                    echo "vos deux mots de passes ne correspondent pas";
                    }
            } else {
                echo "mauvaise adresse mail";
                }
        } else {
            echo "veuillez completer tous les champs";
        }
    
    
    
   //header('Location: index.php');
            ?>
</html>