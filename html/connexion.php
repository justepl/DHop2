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

<body>
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
                        <a class="nav-link" href="favoris.php">Favoris</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="deposeAnnonce.php">Deposer une annonce</a>
                    </li>
                </ul>
                <div class="form-inline my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto" id="list_menu_dte">
                        <?php 
                            if ($_SESSION['authOK']) {                                
                        ?>
                        <li class="nav-item">
                            <a href="monCompte.php" class="nav-link mr-sm-2"><?php echo $_SESSION['login'] ?></a>
                        </li>
                        <li class="nav-item">
                            <a href="deconnexion.php" class="nav-link my-2 my-sm-0">Deconnexion</a>
                        </li>
                        <?php 
                            } else {                                
                        ?>
                        <li class="nav-item">
                            <a href="connexion.php" class="nav-link mr-sm-2" data-toggle="modal" data-target="#exampleModalCenter">Connexion</a>
                        </li>
                        <?php
                            }
                        ?>
                        <li class="nav-item">
                            <a href="panier.php" class="nav-link my-2 my-sm-0">Pannier</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php
            $req = $bd->prepare('SELECT id, ')
        ?>
    
        <?php 
            include 'modal.php';
    ?>
</body>

</html>
