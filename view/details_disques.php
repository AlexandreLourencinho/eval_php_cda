<?php
include "./controller/controller_details_disques.php";
if (isset($_GET['disc_id'])) {
    ?>

    <form action="#" class="form-group col-10 d-flex flex-column align-items-start justify-content-start">

        <p class="h3">Détails</p>
        <div class="col-12 d-flex flex-row mb-2">
            <div class="col-4 me-2">
                <p><label for="detailsTitre">Title :</label></p>
                <input type="text" class="form-control col-6" id="detailsTitre" value="<?= $resultat->disc_title ?>"
                       disabled>
            </div>
            <div class="col-4 ms-2">
                <p><label for="detailsArtiste"> Artist :</label></p>
                <input type="text" class="form-control col-6" id="detailsArtiste" value="<?= $resultat->artist_name ?>"
                       disabled>
            </div>
        </div>
        <div class="col-12 d-flex flex-row">
            <div class="col-4 me-2">
                <p><label for="detailsAnnee">Year :</label></p>
                <input type="text" class="form-control col-6" id="detailsAnnee" value="<?= $resultat->disc_year ?>"
                       disabled>
            </div>
            <div class="col-4 ms-2">
                <p><label for="detailsGenre">Genre :</label></p>
                <input type="text" class="form-control col-6" id="detailsGenre" value="<?= $resultat->disc_genre ?>"
                       disabled>
            </div>
        </div>
        <div class="col-12 d-flex flex-row">
            <div class="col-4 me-2">
                <p><label for="detailsLabel">Label :</label></p>
                <input type="text" class="form-control col-6" id="detailsLabel" value="<?= $resultat->disc_label ?>"
                       disabled>
            </div>
            <div class="col-4 ms-2">
                <p><label for="detailsPrix">Price :</label></p>
                <input type="text" class="form-control col-6" id="detailsPrix" value="<?= $resultat->disc_price ?>"
                       disabled>
            </div>
        </div>
        <div class="d-flex flex-column">
        <label for="detailsImage" class="mt-2">Picture</label>
        <img src="/view/assets/images/<?= $resultat->disc_picture ?>" id="detailsImage" alt="" class="w-50 mb-2 ">
        </div>
<div class="d-flex flex-row mt-2">
        <a href="/view/modifier_disque.php?disc_id=<?= $_GET['disc_id'] ?>" class="btn btn-primary me-2">Modifier</a>
        <a href="/view/supprimer_disque.php?disc_id=<?= $_GET['disc_id'] ?>" class="btn btn-primary me-2">Supprimer</a>
        <a href="/view/liste_disques.php" class="btn btn-primary">Retour</a>
</div>
    </form>
<?php } else {
    echo "oups";
}
?>

























<?php
include "./view/header_footer/footer.php";
?>
