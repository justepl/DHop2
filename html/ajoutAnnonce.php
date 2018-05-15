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
        $bdd = new PDO('mysql:host=localhost;dbname=DHop;charset=utf8', 'root', '');
    }
    catch (Exeption $e) {
        die('Erreur : '.$e->getMessage());
    }
    
    $nomAnnonce = $_POST['nomAnnonce'];
    $marqueVelo = $_POST['marqueVelo'];
    $modelVelo = $_POST['modelVelo'];
    $description = $_POST['description'];
    $upload_dir = '../img';
    
    
        
    if(isset($_FILES['imageVelo']) AND $_FILES['imageVelo']['error'] == 0)
    {
        echo 'ok';
        $infofichier = pathinfo($_FILES['imageVelo']['name']);
        $extension_upload = strtolower( substr( strrchr($_FILES['imageVelo']['name'], '.') ,1));
        $extension_autorises = array('jpg', 'jpeg', 'gif', 'png');
        $nom = md5(uniqid(rand(), true));
        
        if(in_array($extension_upload, $extension_autorises)) {
            // stocker le fichier
           move_uploaded_file($_FILES['imageVelo']['tmp_name'], "$upload_dir/$nom.$extension_upload");
            echo"l'envoie à bien été effectué";
        }
    }
    else {
        echo 'pas ok';
    }
    
    $adresseImage = "$upload_dir/$nom.$extension_upload";
    
    $req = $bdd->prepare('INSERT INTO annonce(nom_annonce, marque_velo, model_velo, description, imageVelo) VALUES(:nom_annonce, :marque_velo, :model_velo, :description, :imageVelo)');
    $req->execute(array(
        'nom_annonce' => $nomAnnonce,
        'marque_velo' => $marqueVelo,
        'model_velo' => $modelVelo,
        'description' => $description,
        'imageVelo' => $adresseImage
    ));

    //header('Location: index.php');
    ?>
    
</html>