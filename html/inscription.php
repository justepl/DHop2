<?php
    session_start();
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
        
        <?php
            //echo($_POST['nom']);
        
            require 'db.php'; // inclu le fichier de co à la bd
                  
                  //securitée :
            if(isset($_POST['pseudo']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['sexe']) && isset($_POST['email']) && isset($_POST['password1']) && isset($_POST['password2'])) {
                $pseudo = addslashes(htmlspecialchars(htmlentities(trim($_POST['pseudo']))));
                $nom = addslashes(htmlspecialchars(htmlentities(trim($_POST['nom']))));
                $prenom = addslashes(htmlspecialchars(htmlentities(trim($_POST['prenom']))));
                $sexe = $_POST['sexe'];
                $email = addslashes(htmlspecialchars(htmlentities(trim($_POST['email']))));
                $password = sha1($_POST['password1']);
                $password_confirm = sha1($_POST['password2']);

                if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$email)) {// verif du format de l'adresse mail 

                    if($password == $password_confirm) { // verifi que les deux mdp sont identiques

                        $req = $bd->query("SELECT pseudo FROM membre WHERE pseudo = '$pseudo'");
                        $count = $req->rowCount(); // verifie que le pseudo est disponnible
                        if($count == 0) {

                            $req = $bd->prepare('INSERT INTO membre(pseudo, nom, prenom, mail, password, sexe, telephone) VALUES(:pseudo, :nom, :prenom, :mail, :password, :sexe, :telephone)');
                            $req->execute(array(
                            'pseudo' => $pseudo,
                            'nom' => $nom,
                            'prenom' => $prenom,
                            'mail' => $email,
                            'password' => $password,
                            'sexe' => $sexe,
                            'telephone' => $_POST['tel']
                                header('Location : index.php');
                            ));  
                        } else{
                            $message = "ce pseudo est déjà utilisé";
                        }                    

                    } else {
                        $message = "vos deux mots de passes ne correspondent pas";
                        }
                } else {
                    $message = "mauvaise adresse mail";
                    }
            } else {
                $message = "veuillez completer tous les champs";
            }

       //header('Location: index.php');
            ?>
            <div class="alert alert-danger col-md-6" id="error_message">
                <?php
                if(empty($message))
                {}
                else {
                ?>
                <?= $message; ?>
                <?php
                }
                ?>
            </div>
        
        
            <div class="row container-fluid" id="img_form_inscription">
                <div class="col-md-6" id="divForm">
                    <form method="post" action="" id="formInscription">
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
                            <label for="telephone">Téléphone</label>
                            <input class="form-control" type="text" id="tel" name="tel" placeholder="Votre numeros de téléphone">
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
                    <img src="../img/inscription_img1.jpg" class="img-fluid" id="img_inscription">
                </div>
            </div>
    </div>
</body>

</html>
