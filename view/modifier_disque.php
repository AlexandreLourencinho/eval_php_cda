<?php
include $_SERVER["DOCUMENT_ROOT"]."/controller/controller_modifier_disque.php";
//var_dump(($_POST));
if (!isset($_POST['envoi']) or isset($_POST['envoi']) and !empty($verifform)) {

    ?>


    <form action="<?= $_SERVER['PHP_SELF'] ?>"
          class="form-group col-10 d-flex flex-column align-items-start justify-content-start" method="post"
          enctype="multipart/form-data" id="formmodif">
        <p class="h3 text-center">Modification de <?= $resultat ? $resultat->disc_title : $_POST['titre'] ?> </p>
        <div class="col-12 d-flex flex-row">
            <div class="col-4 me-2">
                <p><label for="detailsTitre">Title :</label></p>
                <input type="text" class="form-control col-12" id="detailsTitre"
                       value="<?= $_POST ? $_POST['titre'] : $resultat->disc_title ?>" name="titre">
                <p class="<?= isset($verifform['titre']) ? 'alert alert-danger' : '' ?> text-center"><?= $verifform['titre'] ?? ''; ?></p>
            </div>
            <div class="col-4 ms-2">
                <p><label for="artiste">Artist :</label></p>
                <select class="form-select col-12" aria-label="Default select example" id="artiste" name="artiste">
                    <option value="">- Séléctionnez un artiste -</option>
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
        <div class="col-12 d-flex flex-row">
            <div class="col-4 me-2">
                <p><label for="detailsAnnee">Year :</label></p>
                <input name="annee" type="text" class="form-control col-6" id="detailsAnnee"
                       value="<?= $_POST ? $_POST['annee'] : $resultat->disc_year ?>">
                <p class="<?= isset($verifform['annee']) ? 'alert alert-danger' : '' ?> text-center"><?= $verifform['annee'] ?? ''; ?></p>
            </div>
            <div class="col-4 ms-2">
                <p><label for="detailsGenre">Genre :</label></p>
                <input name="genre" type="text" class="form-control col-6" id="detailsGenre"
                       value="<?= $_POST ? $_POST['genre'] : $resultat->disc_genre ?>">
                <p class="<?= isset($verifform['genre']) ? 'alert alert-danger' : '' ?> text-center"><?= $verifform['genre'] ?? ''; ?></p>
            </div>
        </div>
        <div class="col-12 d-flex flex-row">
            <div class="col-4 me-2">
                <p><label for="detailsLabel">Label :</label></p>
                <input name="label" type="text" class="form-control col-6" id="detailsLabel"
                       value="<?= $_POST ? $_POST['label'] : $resultat->disc_label ?>">
                <p class="<?= isset($verifform['label']) ? 'alert alert-danger' : '' ?> text-center"><?= $verifform['label'] ?? ''; ?></p>
            </div>
            <div class="col-4 ms-2">
                <p><label for="detailsPrix">Price :</label></p>
                <input name="prix" type="text" class="form-control col-6" id="detailsPrix"
                       value="<?= $_POST ? $_POST['prix'] : $resultat->disc_price ?>">
                <p class="<?= isset($verifform['prix']) ? 'alert alert-danger' : '' ?> text-center"><?= $verifform['prix'] ?? ''; ?></p>
            </div>
        </div>
        <div class="d-flex flex-column">
            <label for="detailsImage" class="mt-2">Picture</label>
            <img src="/view/assets/images/<?= $resultat->disc_picture ?>" id="detailsImage" alt="" class="w-50 mb-2 ">
        </div>
        <input type="file" id="image" name="image" accept="image/*">
        <p class="<?= isset($verifform['image']) ? 'alert alert-danger' : '' ?> text-center"><?= $verifform['image'] ?? ''; ?></p>
        <div class="justify-content-center col">
            <button type="submit" name="envoi" id="envoi" class="btn btn-info">Modifier</button>
            <input type="hidden" value="<?= $id ?>" name="disc_id">
            <a href="/view/details_disques.php?disc_id=<?= $id ?>" class="btn btn-primary">Retour aux
                détails du disque</a>
            <a href="/view/liste_disques.php" class="btn btn-primary">Retour à la liste des disques</a>

        </div>
    </form>
<?php } else {
    ?>
    <div class="d-flex flex-column align-items-center">
        <h1 class="alert alert-success"> Modification réussie</h1>
        <a href="/view/liste_disques.php" class="btn btn-info">Retour à la liste des disques</a>
        <p>Vous allez être redirigé dans <span id="compteur">5</span> secondes...</p>
    </div>

    <?php
    header("refresh: 5; url=liste_disques.php");
}
?>
    <script src="/view/assets/JavaScript/scripts.js"></script>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/view/header_footer/footer.php";
?>