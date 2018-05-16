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
                $pseudo = $_POST['pseudo'];
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                //$sexe = $_POST['sexe'];
                $email = $_POST['email'];
                
                if($_POST['password1'] == $_POST['password2']) {
                    $password = $_POST['password1'];
                }
                
                
                 $req = $bdd->prepare('INSERT INTO membre(pseudo, nom, prenom, mail, password, ) VALUES(:pseudo, :nom, :prenom, :mail, :password)');
                $req->execute(array(
                'pseudo' => $pseudo,
                'nom' => $nom,
                'prenom' => $prenom,
                'mail' => $email,
                'password' => $password
                //'sexe' => $sexe
    ));
            ?>
</html>