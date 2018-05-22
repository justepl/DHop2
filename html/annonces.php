<?php
    session_start();

    if(empty($_SESSION['connect'])) {
        $_SESSION['connect'] = 0;
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CDN
      BOOTSTRAP -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="../style/css/style.css" rel="stylesheet" type="text/css">
    <!-- CDN
      JQUERRY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- CDN
      BOOTSTRAP JAVASCRIPT-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Skranji" rel="stylesheet">

    <title>DHop</title>

    <?php
        // includes :
     include 'modal.php';
    
    ?>
</head>

<body id="body_Pannonce">
    <?php
        require 'db.php';
        
        $membres = $bd->query('SELECT * FROM membre');
        $annonces = $bd->query('SELECT * FROM annonce');
    
    if ($_SESSION['connect'] == 0) {                                
            ?>
            <nav class="navbar fixed-top navbar-expand-lg navbar-light" id="navbar">
                <a class="navbar-brand" href="index.php" id="logo">DHop</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto" id="list_menu_gch">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Acceuil</a>
                        </li>
                        <li class="nav-item">
                            <btn class="nav-link" isabled="disabled">Favoris</btn>
                        </li>
                        <li class="nav-item">
                            <btn class="nav-link" disabled="disabled">Déposer une annonce</btn>
                        </li>
                    </ul>
                    <div class="form-inline my-2 my-lg-0">
                        <ul class="navbar-nav mr-auto" id="list_menu_dte">
                            <li class="nav-item">
                                <a href="connexion.php" class="nav-link mr-sm-2" data-toggle="modal" data-target="#exampleModalCenter">Connexion</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </nav>
            <?php 
                            } else {                                
                        ?>
            <nav class="navbar fixed-top navbar-expand-lg navbar-light" id="navbar">
                <a class="navbar-brand" href="index.php" id="logo">DHop</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto" id="list_menu_gch">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Acceuil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="favoris.php" disabled>Favoris</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="deposeAnnonce.php" disabled>Déposer une annonce</a>
                        </li>
                    </ul>
                    <div class="form-inline my-2 my-lg-0">
                        <ul class="navbar-nav mr-auto" id="list_menu_dte">
                            
                            <li class="nav-item">
                                <a href="<?php echo" monCompte.php?idVendeur=".$_SESSION['id_vendeur'];?>" class="nav-link mr-sm-2">
                                    <?php echo $_SESSION['identifiant'] ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="deconnexion.php" class="nav-link my-2 my-sm-0">Deconnexion</a>
                            </li>
                            

                        </ul>
                    </div>
                </div>
            </nav>
        <?php
                                            }
                                        ?>

    
    <div id="corpPage_Pannonce">
        <?php
            if(isset($_GET['idAnnonce'])) {
                $reponse_annonces = $bd->query("SELECT * FROM annonce WHERE id_annonce =". $_GET['idAnnonce']);
                
                while ($donnees = $reponse_annonces->fetch())
                {
                    $reponse_membre = $bd->query("SELECT * FROM membre WHERE id =".(int)$donnees['id_vendeur']);
                    while ($donnees_membre = $reponse_membre->fetch())
                    {
                    ?>
                    
                    <div class="container" id="annoncePage_Pannonce">
                        <h2 id="nom_annonce_Pannonce"><?php echo $donnees['nom_annonce']; ?> </h2>
                        
                        <?php 
                        echo'<img src="'.$donnees['imageVelo'].'" alt="image de l\'annonce" class="img-fluid" id="imgVelo_Pannonce">';                    
                        ?>
                        <div class="container-fluid" id="div_marque_model_Pannonce">
                            <div class="col-md-6" id="marque_Pannonce">
                                <p>Marque</p>
                                <?php
                                    echo $donnees['marque_velo'];    
                                ?>
                            </div>
                            <div class="col-md-6" id="model_Pannonce">
                                <p>Modéle</p>
                                <?php
                                    echo $donnees['model_velo'];
                                ?>
                            </div>
                        </div>
                        <p id="description_velo_Pannonce"><span id="titre_description_Pannonce">Description du velo :</span> <br> <span id="description_Pannonce"><?php echo $donnees['description'];?></span></p>
                        
                        <div class="container-fluid">
                            <div class="col-md-3" id="btn_add_Fav_Pannonce">
                                <a href="<?php echo"ajoutFavoris.php?idAnnonce=".$_GET['idAnnonce'];?>" class="btn btn-primary" id="btn_ajouter_fav_Pannonce">Ajouter aux favoris</a>
                            </div>
                            <div class="col-md-3" id="btn_coordonnes_Pannonce">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Coordonées vendeur</button>
                            </div>
                        </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Coordonnées du vendeur :</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                      téléphone : <a href="tel<?php $donnees_membre['telephone']?>"> <?php echo $donnees_membre['telephone'];?></a> <br>
                                      adresse mail : <a href="mailto:<?php $donnees_membre['mail']?>"> <?php echo $donnees_membre['mail'];?></a>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                        
                        <p id="date_ajout_Pannonce"> Ajoutée le : <?php echo $donnees['date'];?> <br>par : <?php echo $donnees_membre['pseudo']?></p>
                    </div>
                    <?php
                    }
                }
            }
        ?>
    </div>
        
</body>

</html>