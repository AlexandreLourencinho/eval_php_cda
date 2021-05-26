<?php
include $_SERVER['DOCUMENT_ROOT']."/controller/controller_creation_compte.php";
if(!isset($_POST['envoi']) OR isset($_POST['envoi']) AND !empty($erreurs)){
    $test = password_hash('1234',PASSWORD_DEFAULT);
    echo $test;
?>


    <!--formulaire de création de compte-->

    <div class="mb-md-5"></div>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="form-group col-12 col-md-6 pt-md-5">
        <label for="nom_compte" class="form-label mt-md-5 text-light fondopac">Votre nom de compte :*</label>
        <input type="text" class="form-control" id="nom_compte" name="nom_compte" placeholder="Saisissez le nom de compte que vous souhaiter utiliser">
        <p class="<?= isset($erreurs['nom']) ? 'alert alert-danger' : '' ?>"><?= $erreurs['nom'] ?? ''; ?></p>

        <label for="mdp_compte" class="form-label text-light fondopac"> Votre mot de passe :*</label>
        <input type="text" class="form-control" id="mdp_compte" name="mdp_compte" placeholder="Saisissez votre mot de passe">
        <p class="<?= isset($erreurs['mdp'])? 'alert alert-danger' : '' ?>"><?= $erreurs['mdp'] ?? ''; ?></p>

        <label for="mdp_compte_verif" class="form-label text-light fondopac"> Confirmez votre mot de passe :*</label>
        <input type="text" class="form-control" id="mdp_compte_verif" name="mdp_compte_verif" placeholder="confirmez votre mot de passe">
        <p class="<?= isset($erreurs['mdp2']) ? 'alert alert-danger' : '' ?>"><?= $erreurs['mdp2'] ?? ''; ?></p>

        <label for="mail_compte" class="form-label text-light fondopac">Votre adresse éléctronique :*</label>
        <input type="text" class="form-control" id="mail_compte" name="mail_compte" placeholder="saisissez votre email">
        <p class="<?= isset($erreurs['mail']) ? 'alert alert-danger' : '' ?>"><?= $erreurs['mail'] ?? ''; ?></p>

        <div class="d-flex flex-column mt-3 col-12">
            <button type="submit" class="btn btn-success mb-1 align-self-center col-12" name="envoi"> S'inscrire</button>
            <a href="/index.php" class=" text-center btn btn-dark mb-1">retour a l'accueil</a>
        </div>
    </form>
<?php
}elseif (isset($_POST['envoi']) AND empty($erreurs)){
?>
        <div class="d-flex flex-column">
<h1>Votre compte à bien été créé</h1>
    <a href="/view/liste_disques.php" class="btn btn-info">Retour à la liste des disques</a>
    <p>Vous allez être redirigé dans <span id="compteur">5</span> secondes...</p>
        </div>
    <?php
    header("refresh: 5; url=connexion.php");
}
    ?>


























    <script src="/view/assets/JavaScript/scripts.js"></script>
<?php
include $_SERVER['DOCUMENT_ROOT']."/view/header_footer/footer.php";
?>