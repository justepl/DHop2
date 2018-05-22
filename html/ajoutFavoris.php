<?php
    session_start();

    if(empty($_SESSION['connect'])) {
        $_SESSION['connect'] = 0;
        $_SESSION['identifiant'] = '';
    }

 require 'db.php';

$reponse = $bd->query('SELECT * FROM membre WHERE pseudo=\''.$_SESSION['identifiant'].'\'');
$id_membre;
$id_annonce;
while ($donnees = $reponse->fetch()){
    $id_annonce = $_GET['idAnnonce'];
    $id_membre = $donnees['id'];
}
$req = $bd->prepare('INSERT INTO favoris(id_user, id_annonce) VALUES (:id_user, :id_annonce)');
                        $req->execute(array(
                        'id_user' => $id_membre,
                        'id_annonce' => $id_annonce                        
                        )); 
header('Location: annonces.php?idAnnonce='.$_GET['idAnnonce']);

?>
