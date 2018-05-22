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
    <!-- CDN-->
    <script src="../js/script.js"></script>
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

<body>
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


        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Connexion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="connexion.php">
                            <div class="form-group">
                                <label for="identifiant">Identifiant :</label>
                                <input class="form-control" type="text" name="identifiant" id="identifiant" placeholder="email" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe :</label>
                                <input class="form-control" type="password" id="password" name="password" placeholder="password">
                                <br>
                                <input type="submit" name="submit" value="Connexion">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <a type="button" class="btn btn-primary" href="inscription.php">S'inscrire</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" id="container_form_ajoutAnnonce">
            <form method="post" action="ajoutAnnonce.php" enctype="multipart/form-data">
                <label for="nomAnnonce">Nom de l'annonce </label>
                <div class="input-group col-md-4">                    
                    <input class="form-control" type="text" name="nomAnnonce" id="nomAnnonce" placeholder="nom de l'annonce">
                </div>
                
                 <label for="imageVelo" class="">Choisissez une image pour votre annonce</label> <br>
                <div class="input-group  col-md-4">
                    <input type="file" name="imageVelo" id="imageVelo"><br>
                </div>
                
                <label for="marqueVelo">Marque du velo </label>
                <div class="input-group  col-md-4">                    
                    <input class="form-control" type="text" name="marqueVelo" id="marqueVelo" placeholder="marque du velo">
                </div>
                
                <label for="modelVelo">Model du velo </label>
                <div class="input-group  col-md-4">                    
                    <input class="form-control" type="text" name="modelVelo" id="modelVelo" placeholder="marque du velo">
                </div>
                
                <label for="prix">Prix du velo </label>
                <div class="input-group col-md-4">
                    <input class="form-control" type="text" name="prix" id="prix" aria-label="Amount (to the nearest dollar)" placeholder="prix">
                    <div class="input-group-append">
                        <span class="input-group-text">€</span>
                    </div>
                </div>

                <label for="description">Decription du velo </label>
                <div class="input-group  col-md-6">                    
                    <textarea class="form-control" type="text" name="description" id="description" rows="3" placeholder="description generale de votre velo"></textarea>
                </div>
                <div class="input-group  col-md-6">
                    <button type="submit" class="btn btn-primary" id="submit">Mettre en ligne !</button>
                </div>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

</body>

</html>
