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
      ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <a class="navbar-brand" href="index.php">DHop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Acceuil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="annonces.php">Annonces</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="favoris.php">Favoris</a>
                    </li>
                    <li class="nav-item  active">
                        <a class="nav-link" href="deposeAnnonce.php active">Deposer une annonce</a>
                    </li>
                </ul>
                <div class="form-inline my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="connexion.php" class="nav-link mr-sm-2" data-toggle="modal" data-target="#exampleModalCenter">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a href="panier.php" class="nav-link my-2 my-sm-0">Pannier</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

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

        <div class="container">
            <form method="post" action="ajoutAnnonce.php" enctype="multipart/form-data">
                <div class="form-group col-md-6">
                    <label for="nomAnnonce">Nom de l'annonce </label>
                    <input class="form-control" type="text" name="nomAnnonce" id="nomAnnonce">
                </div>

                <div class="form-group  col-md-6">
                    <label for="imageVelo" class="">Choisissez une image pour votre annonce</label> <br>
                    <input type="file" class=" btn" name="imageVelo" id="imageVelo"><br>    
                </div>
                <div class="form-group  col-md-6">
                    <label for="marqueVelo">Marque du velo </label>
                    <input class="form-control" type="text" name="marqueVelo" id="marqueVelo">
                </div>
                <div class="form-group  col-md-6">
                    <label for="modelVelo">Model du velo </label>
                    <input class="form-control" type="text" name="modelVelo" id="modelVelo">
                </div>
                <div class="form-group  col-md-6">
                    <label for="description">Decription du velo </label>
                    <textarea class="form-control" type="text" name="description" id="description" rows="3"></textarea>
                </div>
                <div class="form-group  col-md-6">
                    <input type="submit" class="btn btn-primary" id="submit">
                </div>
            </form>
        </div>
</body>

</html>
