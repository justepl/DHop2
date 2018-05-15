<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> test bdd</title>
</head>

<body>
    
</body>
    <?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }
    catch (Exeption $e) {
        die('Erreur : '.$e->getMessage());
    }
    
    $nom = $_POST['nom'];
    $age = $_POST['age'];
    
    
    $req = $bdd->prepare('INSERT INTO test(nom, age) VALUES(:nom, :age)');
    $req->execute(array(
        'nom' => $nom,
        'age' => $age
    ));
    ?>
    
    <form method="post" action="testbdd.php">
        <label for="nom">nom : </label>
        <input type="text" name="nom" id="nom">
        <label for="age">age : </label>
        <input type="text" name="age" id="age">
        <input type="submit">
    </form>
</html>




<?php echo'<img src="'.$donnees['imageVelo'].'" alt="image de l\'annonce" id="imgVelo"/>'; ?>
                        <span id="nom_annonce">
                            <?php echo $donnees['nom_annonce']; ?>
                            <br/>
                        </span>
                        <span id="marque_velo">
                            <?php echo $donnees['marque_velo']; ?>
                        </span>
                        <span id="model_Velo">
                            <?php echo $donnees['model_velo']; ?>
                        </span>