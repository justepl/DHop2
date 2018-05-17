<?php
    session_start();
?>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" id="modal_header">
                <h5 class="modal-title" id="exampleModalLongTitle">Connexion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="connexion_post.php">
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
