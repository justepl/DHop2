<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CDN
      BOOTSTRAP -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <!-- CDN
      JQUERRY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- CDN
      BOOTSTRAP JAVASCRIPT-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <title>DHop</title>
    </head>
    
    <body>
        <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
          <a class="navbar-brand" href="index.php" id="logo">DHop</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" >
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active ">
                <a class="nav-link btn btn-secondary" href="annonces.php" id="annonce">Annonces <span class="sr-only">(current)</span></a>
              </li> 
              <li class="nav-item active ">
                <a class="nav-link btn btn-secondary"  href="favoris.php" id="favoris">Favoris <span class="sr-only">(current)</span></a>
              </li>           
              <li class="nav-item active ">
                <a class="nav-link btn btn-secondary" href="deposeAnnonce.php" id="depose">Deposer Une Annonce <span class="sr-only">(current)</span></a>
              </li>           
            </ul>
              <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search" id="barRecherche">
                  <button class="btn btn-secondary my-2 my-lg-0" type="submit" id="btnRechercher">Rechercher</button>
              </form>
              
            <span class="navbar-text "><a class="nav-link btn btn-secondary disabled" aria-disabled="true" id="aPanier" href="panier.php">panier</a></span>
            <span class="navbar-text"><a class="nav-link btn btn-secondary " id="aConnexion" href="connexion.php">Connexion</a></span>
          </div>
        </nav>
    </body>       
</html>