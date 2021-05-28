<?php
include $_SERVER['DOCUMENT_ROOT']."/controller/controller_mdp_oublie.php";
?>


<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="form-group">
    <label for="mail_compte" class="form-label">Veuillez renseigner l'email de votre compte : *</label>
    <input type="text" id="mail_compte" name="mail_compte" class="form-control" placeholder="votre email">
    <button type="submit" name="envoi">envoyer</button>
    <a href="/view/liste_disques.php" class="btn btn-dark">Retour liste disque</a>
    <a href="/view/connexion.php" class="btn btn-info">Se connecter</a>
</form>
<?php
include $_SERVER['DOCUMENT_ROOT']."/view/header_footer/footer.php";
?>