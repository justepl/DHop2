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

<body>
    <?php
        require 'db.php';
        
        $membres = $bd->query('SELECT * FROM membre');
        $annonces = $bd->query('SELECT * FROM annonce');
      ?>

        <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
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
                        <a class="nav-link" href="annonces.php">Annonces</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="favoris.php">Favoris</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="deposeAnnonce.php">Deposer une annonce</a>
                    </li>
                </ul>
                <div class="form-inline my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto" id="list_menu_dte">
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

        <div class="container" id="corpSite">
            <h1 id="titreAnnonce">Les Annonce de DH : </h1>
            <?php
                while ($donnees = $annonces->fetch())
                {
                        ?>
                
                <a href="annonces.php" id="lienAnnonce">
                    <div class="row" id="blockAnnonce">
                    <!--<div class="row" id="blockAnnonce">-->
                        <div class="col-lg-3"><?php echo'<img src="'.$donnees['imageVelo'].'" alt="image de l\'annonce" id="imgVelo">'; ?></div>
                        <aside>
                            <p id="nom_annonce"><?php echo $donnees['nom_annonce']; ?></p>
                            <p id="marque_velo">Marque : <?php echo $donnees['marque_velo']; ?></p>
                            <p id="model_velo">Model : <?php echo $donnees['model_velo']; ?></p>
                        </aside>
                    </div>
                </a>
                <?php
                    }
            ?>
        </div>
</body>

</html>
