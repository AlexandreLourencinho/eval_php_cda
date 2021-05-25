<?php
include $_SERVER['DOCUMENT_ROOT']."/controller/controller_creation_compte.php";
?>


    <!--formulaire de création de compte-->

    <div class="mb-md-5"></div>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="form-group col-12 col-md-6 pt-md-5">
        <label for="nom_compte" class="form-label mt-md-5 text-light fondopac">Votre nom de compte :</label>
        <input type="text" class="form-control" id="nom_compte" name="nom_compte" placeholder="Saisissez le nom de compte que vous souhaiter utiliser">
        <label for="mdp_compte" class="form-label text-light fondopac"> Votre mot de passe :</label>
        <input type="text" class="form-control" id="mdp_compte" name="mdp_compte" placeholder="Saisissez votre mot de passe">
        <label for="mdp_compte_verif" class="form-label text-light fondopac"> Confirmez votre mot de passe :</label>
        <input type="text" class="form-control" id="mdp_compte_verif" name="mdp_compte" placeholder="confirmez votre mot de passe">
        <label for="mail_compte" class="form-label text-light fondopac">Votre adresse éléctronique :</label>
        <input type="text" class="form-control" id="mail_compte" name="mail_compte" placeholder="saisissez votre email">
        <div class="d-flex flex-column mt-3 col-12">
            <button type="submit" class="btn btn-success mb-1 align-self-center col-12" name="envoi"> S'inscrire</button>
            <a href="/index.php" class=" text-center btn btn-dark mb-1">retour a l'accueil</a>
        </div>
    </form>






























<?php
include $_SERVER['DOCUMENT_ROOT']."/view/header_footer/footer.php";
?>