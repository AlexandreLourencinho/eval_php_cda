<?php
//appel du controller
include $_SERVER["DOCUMENT_ROOT"] . "/controller/controller_modifier_disque.php";

// si le formulaire n'a pas été rempli ou si il l'a été avec des erreurs(donc première venue sur la page ou erreur dans
// le formulaire
if (!isset($_POST['envoi']) or isset($_POST['envoi']) and !empty($verifform)) {

    ?>

<!--début du formulaire-->
    <form action="<?= $_SERVER['PHP_SELF'] ?>"
          class="form-group col-12 col-md-10 d-flex flex-column align-items-start justify-content-start mb-3" method="post"
          enctype="multipart/form-data" id="formmodif">
        <p class="h3 text-center text-light">Modification de <?= $resultat->disc_title ?> de <?= $resultat->artist_name ?></p>
        <div class="col-12 d-flex flex-md-row flex-column">
            <div class="col-12 col-md-5 me-2">
<!--                titre-->
                <p><label for="detailsTitre" class="text-light">Title :</label></p>
                <input type="text" class="form-control col-12" id="detailsTitre"
                       value="<?= $_POST ? $_POST['titre'] : $resultat->disc_title ?>" name="titre">
                <p class="<?= isset($verifform['titre']) ? 'alert alert-danger' : '' ?> text-center"><?= $verifform['titre'] ?? ''; ?></p>
            </div>
<!--            artistes-->
            <div class="col-12 col-md-5 ms-md-2">
                <p><label for="artiste" class="text-light">Artist :</label></p>
                <select class="form-select col-12" aria-label="Default select example" id="artiste" name="artiste">
                    <option disabled>- Séléctionnez un artiste -</option>
                    <?php
                    foreach ($resultat2 as $artistes) {

                        ?>
                        <option <?= $resultat->artist_id == $artistes->artist_id ? "selected" : ""; ?>
                                value="<?= $artistes->artist_id ?>">
                            <?= $artistes->artist_name ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
<!--        année du disque-->
        <div class="col-12 d-flex flex-md-row flex-column">
            <div class="col-12 col-md-5 me-2">
                <p><label for="detailsAnnee" class="text-light">Year :</label></p>
                <input name="annee" type="text" class="form-control col-6" id="detailsAnnee"
                       value="<?= $_POST ? $_POST['annee'] : $resultat->disc_year ?>">
                <p class="<?= isset($verifform['annee']) ? 'alert alert-danger' : '' ?> text-center"><?= $verifform['annee'] ?? ''; ?></p>
            </div>
<!--            genre du disque-->
            <div class="col-12 col-md-5 ms-md-2">
                <p><label for="detailsGenre" class="text-light">Genre :</label></p>
                <input name="genre" type="text" class="form-control col-6" id="detailsGenre"
                       value="<?= $_POST ? $_POST['genre'] : $resultat->disc_genre ?>">
                <p class="<?= isset($verifform['genre']) ? 'alert alert-danger' : '' ?> text-center"><?= $verifform['genre'] ?? ''; ?></p>
            </div>
        </div>
<!--        label du disque-->
        <div class="col-12 d-flex flex-md-row flex-column">
            <div class="col-12 col-md-5 me-2">
                <p><label for="detailsLabel" class="text-light">Label :</label></p>
                <input name="label" type="text" class="form-control col-6" id="detailsLabel"
                       value="<?= $_POST ? $_POST['label'] : $resultat->disc_label ?>">
                <p class="<?= isset($verifform['label']) ? 'alert alert-danger' : '' ?> text-center"><?= $verifform['label'] ?? ''; ?></p>
            </div>
<!--            prix du disque-->
            <div class="col-12 col-md-5 ms-md-2">
                <p><label for="detailsPrix" class="text-light">Price :</label></p>
                <input name="prix" type="text" class="form-control col-6" id="detailsPrix"
                       value="<?= $_POST ? $_POST['prix'] : $resultat->disc_price ?>">
                <p class="<?= isset($verifform['prix']) ? 'alert alert-danger' : '' ?> text-center"><?= $verifform['prix'] ?? ''; ?></p>
            </div>
        </div>
<!--        image du disque-->
        <div class="d-flex flex-column">
            <label for="detailsImage" class="mt-2 text-light">Picture</label>
            <img src="/view/assets/images/<?= $resultat->disc_picture ?>" id="detailsImage" alt="" class="w-50 mb-2 ">
        </div>
        <label for="image"class="text-light">Choisissez une image d'illustration :</label>
        <input type="file" id="image" name="image" accept="image/*" class="text-light">
        <p class="<?= isset($verifform['image']) ? 'alert alert-danger' : '' ?> text-center"><?= $verifform['image'] ?? ''; ?></p>
<!--        boutons submit retour aux détails etc-->
        <div class="justify-content-center col">
            <button type="submit" name="envoi" id="envoi" class="btn btn-outline-warning" title="confirmer la modification de <?= $resultat->disc_title ?>">Modifier</button>
            <input type="hidden" value="<?= $id ?>" name="disc_id">
            <a href="/view/details_disques.php?disc_id=<?= $id ?>" class="btn btn-outline-info" title="retour aux détails du disque <?= $resultat->disc_title ?>">Retour aux
                détails du disque</a>
            <a href="/view/liste_disques.php" class="btn btn-outline-light" title="retour à la liste des disques">Retour à la liste des disques</a>
        </div>
    </form>

<?php }
elseif (isset($modification) and $modification['resultat'] === true) {
    //si la modification s'est bien faite
    ?>
    <div class="d-flex flex-column align-items-center">
        <h1 class="alert alert-success"> Modification réussie</h1>
        <a href="/view/liste_disques.php" class="btn btn-outline-info" title="retournez à la liste des disques">Retour à la liste des disques</a>
        <p class="text-light">Vous allez être redirigé dans <span id="compteur">5</span> secondes...</p>
    </div>

    <?php
    //redirection après 5 secondes
    header("refresh: 5; url=liste_disques.php");
    // si la modification a été tentée mais a échouée
} elseif (isset($modification) and $modification['resultat'] === false) {
    ?>
    <div class="d-flex flex-column align-items-center">
        <h2 class="alert alert-danger">Un problème est survenu : <?= $modification['message'] ?>.</h2>
        <p class="text-light">Contactez un administrateur, ou retournez a la liste des disque et retentez le processus.</p>
        <a href="/view/liste_disques.php" class="btn btn-outline-info" title="retournez à la liste des disques">Retour à la liste des disques</a>
    </div>
    <?php
}
?>
<!-- sccript js pour le compteur-->
    <script src="/view/assets/JavaScript/scripts.js"></script>
<?php
include $_SERVER["DOCUMENT_ROOT"] . "/view/header_footer/footer.php";
?>