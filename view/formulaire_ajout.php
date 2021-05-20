<?php
include $_SERVER["DOCUMENT_ROOT"]."/controller/controller_formulaire_ajout.php";
if(!isset($_POST['envoi']) or isset($_POST['envoi']) and  !empty($verifform)){
?>

<form enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="form-group col-9 d-flex flex-column">
    <label for="titre">Title :</label>
    <input type="text" id="titre" name="titre" class="form-control" value="<?= $_POST['titre'] ?? '' ?>">
    <span class="<?= isset($verifform['titre']) ? 'alert alert-danger' : '' ?> text-center"><?= $verifform['titre'] ?? '';  ?></span>
    <label for="artiste">Artiste :</label>
    <select class="form-select" aria-label="Default select example" id="artiste" name="artiste">
        <option <?= !isset($_POST['artiste'])? 'selected' :'' ;?> value="">- Séléctionnez un artiste -</option>
        <?php
        foreach ($resultat as $artistes) {

            ?>
            <option <?= isset($_POST['artiste']) && $_POST['artiste'] === $artistes->artist_id ? 'selected' :'' ;?> value="<?= $artistes->artist_id ?>"><?= $artistes->artist_name ?></option>
        <?php } ?>
    </select>
    <span class="<?= isset($verifform['artiste']) ? 'alert alert-danger' : '' ?> text-center"><?= $verifform['artiste'] ?? '';  ?></span>
    <label for="annee">Year :</label>
    <input type="text" id="annee" name="annee" class="form-control" value="<?= $_POST['annee'] ?? '' ?>">
    <span class="<?= isset($verifform['annee']) ? 'alert alert-danger' : '' ?> text-center"><?= $verifform['annee'] ?? '';  ?></span>
    <label for="genre">Genre :</label>
    <input type="text" id="genre" name="genre" class="form-control" value="<?= $_POST['genre'] ?? '' ?>">
    <span class="<?= isset($verifform['genre']) ? 'alert alert-danger' : '' ?> text-center"><?= $verifform['genre'] ?? '';  ?></span>
    <label for="label">Label :</label>
    <input type="text" id="label" name="label" class="form-control" value="<?= $_POST['label'] ?? '' ?>">
    <span class="<?= isset($verifform['label']) ? 'alert alert-danger' : '' ?> text-center"><?= $verifform['label'] ?? '';  ?></span>
    <label for="prix">Price :</label>
    <input type="text" id="prix" name="prix" class="form-control" value="<?= $_POST['prix'] ?? '' ?>">
    <span class="<?= isset($verifform['prix']) ? 'alert alert-danger' : '' ?> text-center"><?= $verifform['prix'] ?? '';  ?></span>
    <label for="image">Picture :</label>
    <input type="file" id="image" name="image" accept="image/*">
    <span class="<?= isset($verifform['image']) ? 'alert alert-danger' : '' ?> text-center"><?= $verifform['image'] ?? ''; ?></span>
    <div class="mt-3">
    <button type="submit" class="btn btn-primary" name="envoi" id="envoi">Envoyer</button>
    <a href="#" class="btn btn-primary">Réinitialiser</a>
    <a href="/view/liste_disques.php" class="btn btn-primary">Retour</a>
    </div>
</form>
<?php }else { ?>
        <div class="d-flex flex-column align-items-center">
<h1 class="alert alert-success"> Bien ajouté à la bdd</h1>
    <a href="/view/liste_disques.php" class="btn btn-info">Retour à la liste des disques</a>
            <p>Vous allez être redirigé dans <span id="compteur">5</span> secondes...</p>
        </div>
    <script src="/view/assets/JavaScript/scripts.js"></script>
<?php
    header("refresh: 5; url=liste_disques.php");
}
include $_SERVER["DOCUMENT_ROOT"]."/view/header_footer/footer.php";
?>
