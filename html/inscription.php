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
    <!--CDN
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
    <div id="inscription">
        <?php
        require 'db.php';
        
        $membres = $bd->query('SELECT * FROM membre');
        $annonces = $bd->query('SELECT * FROM annonce');
      ?>
            <nav class="navbar fixed-top navbar-expand-lg navbar-light" id="navbar">
                <a class="navbar-brand" href="index.php" id="logo">DHop</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto" id="list_menu_gch">
                        <li class="nav-item">
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

            <div class="row container-fluid" id="divForm">
                <div class="col-md-6">
                    <form method="post" action="ajoutMembre.php" id="formInscription">
                        <div class="form-group">
                            <label for="pseudo">Pseudo :</label>
                            <input class="form-control" type="text" id="pseudo" name="pseudo" placeholder="Votre pseudo" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="nom">Nom :</label>
                            <input class="form-control" type="text" name="nom" id="nom" placeholder="Votre Nom">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prenom :</label>
                            <input class="form-control" type="text" id="prenom" name="prenom" placeholder="Votre Prenom">
                        </div>
                        <div class="form-group">
                            <label for="sexe">Sexe</label>
                            <select id="sexe" name="sexe" class="form-control">
                        <option selected>sexe...</option>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                    </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Adresse mail :</label>
                            <input class="form-control" type="text" id="email" name="email" placeholder="votre adresse mail">
                        </div>
                        <div class="form-group">
                            <label for="password1">Mot de passe :</label>
                            <input class="form-control" type="password" id="passsword1" name="password1" placeholder="votre Mot de passe">
                        </div>
                        <div class="form-group">
                            <label for="password2">Confirmation du mot de passe</label>
                            <input class="form-control" type="password" id="password2" name="password2" placeholder="confirmation mot de passe">
                        </div>
                        <input class="btn btn-primary" type="submit" name="submit" value="S'inscrire">
                    </form>
                </div>
                <div class="container-fluid col-md-6" id="img_div_form_inscription">
                    <img src="../img/inscription_img1.jpg" class="img-fluid">
                </div>
            </div>
    </div>
</body>

</html>
