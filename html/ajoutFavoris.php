<?php
    session_start();

    if (isset($_SESSION['login']) && isset($_SESSION['mdp'])) {
    } else {
        $_SESSION['login'] = '';
        $_SESSION['authOK'] = false;
    }

 require 'db.php';

$reponse = $bd->query('SELECT * FROM membre WHERE pseudo=\''.$_SESSION['login'].'\'');
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
