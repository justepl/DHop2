<?php
    session_start();

    if(empty($_SESSION['connect'])) {
        $_SESSION['connect'] = 0;
        $_SESSION['identifiant'] = '';
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

    <body id="body_Pindex">
        <?php
        require 'db.php';
        
        $membres = $bd->query('SELECT * FROM membre');
        $annonces = $bd->query('SELECT * FROM annonce WHERE id_vendeur='.$_GET['idVendeur']);
      
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
                                <a href="monCompte.php" class="nav-link mr-sm-2">
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
        
        
        <div class="container" id="corpSite_Pindex">
                <h1 id="titreAnnonce">Mes Annonces : </h1>
                <?php
                while ($donnees = $annonces->fetch())
                {
                        ?>

                    <a href="<?php echo" annonces.php?idAnnonce=".$donnees['id_annonce'];?>" id="lienAnnonce">
                        <div class="row" id="blockAnnonce_Pindex">
                            <!--<div class="row" id="blockAnnonce">-->
                            <div class="col-lg-3" id="div_img_velo">
                                <?php echo'<img src="'.$donnees['imageVelo'].'" alt="image de l\'annonce" id="imgVelo">'; ?></div>
                            <aside>
                                <p id="nom_annonce">
                                    <?php echo $donnees['nom_annonce']; ?>
                                </p>
                                <p id="marque_velo">Marque :
                                    <?php echo $donnees['marque_velo']; ?>
                                </p>
                                <p id="model_velo">Modéle :
                                    <?php echo $donnees['model_velo']; ?>
                                </p>
                                <p id="prix_velo">
                                    <?php echo $donnees['prix'];?> €</p>
                            </aside>
                        </div>
                    </a>
                    <?php
                    }
            ?>

            </div>