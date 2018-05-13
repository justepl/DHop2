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
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <a class="navbar-brand" href="index.php">DHop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
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

        <?php
            //echo($_POST['nom']);
        
            require 'db.php'; // inclu le fichier de co à la bdd
            if (isset($_POST['pseudo']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['sexe']) && isset($_POST['email']) && isset($_POST['password1']) && isset($_POST['password2'])) { 
                  
                  //securitée :
                $pseudo = addslashes(htmlspecialchars(htmlentities(trim($_POST['pseudo']))));
                $nom = addslashes(htmlspecialchars(htmlentities(trim($_POST['nom']))));
                $prenom = addslashes(htmlspecialchars(htmlentities(trim($_POST['prenom']))));
                $sexe = addslashes(htmlspecialchars(htmlentities(trim($_POST['sexe']))));
                $email = addslashes(htmlspecialchars(htmlentities(trim($_POST['email']))));
                $password = sha1($_POST['password1']);
                $passwordConfirm = sha1($_POST['password2']);

                if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) { /* verification si l'email est bien un email*/
                    
                   if ($password == $passwordConfirm) { /* verification si les mdp et la confirmation sont egals*/
                       $req = $db->query("SELECT pseudo FROM membre WHERE pseudo = '$pseudo'");
                        $count = $req->rowCount(); /* on verifie que le pseudo n'est pas deja utilisé*/
                        
                       if ($count == 0) {
                            $req = $db->exec("INSERT INTO 'membre'('pseudo', 'nom', 'prenom', 'mail', 'password', 'sexe') VALUES('pseudo', 'nom', 'prenom', 'email', 'password', 'sexe')");
                            /*$req->execute(array(
                                'pseudo' => $pseudo,
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'mail' => $email,
                                'password' => $password,
                                'sexe' => $sexe
                            ));*/
                            header('Location: inscription.php');
                        } else {
                            $message = 'Cette adresse mail est d"ja utilisée.';
                        }
                    } else {
                    $message = 'Cet identifiant est déjà utilisé.';
                    }
                } else {
                    $message = 'vos mot de passes ne sont pas identiques';
                }    
            } else {
                $message = 'Votre adresse mail n\'est pas valide';
            }
            ?>

            <div class="container" id="divForm">
                <form method="post" action="inscription.php" id="formInscription">
                    <div class="form-group col-md-4">
                        <label for="pseudo">Pseudo :</label>
                        <input class="form-control" type="text" id="pseudo" name="pseudo" placeholder="Votre pseudo" autofocus>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nom">Nom :</label>
                        <input class="form-control" type="text" name="nom" id="nom" placeholder="Votre Nom">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="prenom">Prenom :</label>
                        <input class="form-control" type="text" id="prenom" name="prenom" placeholder="Votre Prenom">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="sexe">Sexe</label>
                        <select id="sexe" class="form-control">
                        <option selected>sexe...</option>
                        <option>Homme</option>
                        <option>Femme</option>
                    </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">Adresse mail :</label>
                        <input class="form-control" type="text" id="email" name="email" placeholder="votre adresse mail">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="password1">Mot de passe :</label>
                        <input class="form-control" type="text" id="passsword1" name="password1" placeholder="votre Mot de passe">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="password2">Confirmation du mot de passe</label>
                        <input class="form-control" type="text" id="password2" name="password2" placeholder="confirmation mot de passe">
                    </div>
                    <input class="btn btn-primary" type="submit" name="submit" value="S'inscrire">
                </form>
            </div>
</body>

</html>
