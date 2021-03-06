<?php
//appel du controller
include $_SERVER["DOCUMENT_ROOT"] . "/controller/controller_details_disques.php";

// si l'id a bien été passé dans l'url
if (isset($_GET['disc_id'])) {
    ?>
    <!--début du formulaire-->
    <form action="#" class="form-group col-12 col-md-10 d-flex flex-column align-items-start justify-content-start">

        <p class="h3 text-light">Détails du disque <?= $resultat->disc_title ?> de <?= $resultat->artist_name ?> </p>
<!--        titre   -->
        <div class="col-12 d-flex flex-md-row flex-column mb-2">
            <div class="col-12 col-md-4 me-2">
                <p><label for="detailsTitre" class="text-light">Title :</label></p>
                <input type="text" class="form-control col-12 col-md-6" id="detailsTitre"
                       value="<?= $resultat->disc_title ?>"
                       disabled>
            </div>
<!--            nom de l'artiste-->
            <div class="col-12 col-md-4 ms-md-2">
                <p><label for="detailsArtiste" class="text-light"> Artist :</label></p>
                <input type="text" class="form-control col-12 col-md-6" id="detailsArtiste"
                       value="<?= $resultat->artist_name ?>"
                       disabled>
            </div>
        </div>
<!--        année du disque-->
        <div class="col-12 d-flex flex-column flex-md-row">
            <div class="col-12 col-md-4 me-2">
                <p><label for="detailsAnnee" class="text-light">Year :</label></p>
                <input type="text" class="form-control col-12 col-md-6" id="detailsAnnee"
                       value="<?= $resultat->disc_year ?>"
                       disabled>
            </div>
<!--            genre du disque-->
            <div class="col-12 col-md-4 ms-md-2">
                <p><label for="detailsGenre" class="text-light">Genre :</label></p>
                <input type="text" class="form-control col-12 col-md-6" id="detailsGenre"
                       value="<?= $resultat->disc_genre ?>"
                       disabled>
            </div>
        </div>
<!--        label du disque-->
        <div class="col-12 d-flex flex-column flex-md-row">
            <div class="col-12 col-md-4 me-2">
                <p><label for="detailsLabel" class="text-light">Label :</label></p>
                <input type="text" class="form-control col-12 col-md-6" id="detailsLabel"
                       value="<?= $resultat->disc_label ?>"
                       disabled>
            </div>
<!--            prix du disque-->
            <div class="col-12 col-md-4 ms-md-2">
                <p><label for="detailsPrix" class="text-light">Price :</label></p>
                <input type="text" class="form-control col-12 col-md-6" id="detailsPrix"
                       value="<?= $resultat->disc_price ?>"
                       disabled>
            </div>
        </div>
<!--        image du disque-->
        <div class="d-flex flex-column">
            <label for="detailsImage" class="mt-2 text-light">Picture</label>
            <img src="/view/assets/images/<?= $resultat->disc_picture ?>" id="detailsImage"
                 title="pochette du disque <?= $resultat->disc_title ?> de <?= $resultat->artist_name ?>."
                 alt="pochette du disque <?= $resultat->disc_title ?> de <?= $resultat->artist_name ?>."
                 class="w-50 mb-2 ">
        </div>
        <div class="d-flex flex-row mt-2">
<!--            liens vers les pages modifier ou supprimer (et retour ) -->
            <a href="/view/modifier_disque.php?disc_id=<?= $_GET['disc_id'] ?>" class="btn btn-outline-warning me-2"
               title="accès à la page de modification de <?= $resultat->disc_title ?>">Modifier</a>
            <a href="/view/supprimer_disque.php?disc_id=<?= $_GET['disc_id'] ?>" class="btn btn-danger me-2"
               title="accès à la page de suppression de <?= $resultat->disc_title ?> ">Supprimer</a>
            <a href="/view/liste_disques.php" class="btn btn-outline-info"
               title="retour à la liste des disques">Retour</a>
        </div>
    </form>
<?php
} else {
?>
<!--        apparaît en cas d'erreur-->
<p class="h1 alert alert-danger">Une erreur dans la récupération du disque est survenue.</p>
    <span>Veuillez retourner à la page de la liste des disques, ou contactez un administrateur.</span>
    <a href="/view/liste_disques.php" class="btn btn-outline-info"
       title="retour à la liste des disques">Retour</a>
<?php
}

include $_SERVER["DOCUMENT_ROOT"] . "/view/header_footer/footer.php";
?>
