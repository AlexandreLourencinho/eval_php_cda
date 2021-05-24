<?php
// appel du controller
include $_SERVER["DOCUMENT_ROOT"] . "/controller/controller_supprimer_disques.php";

// n'apparaît que si la suppression n'a pas été lancée
if (!isset($suppr)) {
    ?>
<!--affichage des infos du disque a supprimer-->
    <form action="<?= $_SERVER['PHP_SELF'] ?>"
          class="form-group col-12 col-md-10 d-flex flex-column align-items-start justify-content-start" method="post"
          id="supprform">
        <p class="h3 text-center text-light">Suppression de <?= $resultat->disc_title ?> de <?= $resultat->artist_name ?></p>
        <div class="col-12 d-flex flex-md-row flex-column mb-2">
            <div class="col-12 col-md-4 me-2">
                <p><label for="detailsTitre" class="text-light">Title :</label></p>
                <input type="text" class="form-control col-6" id="detailsTitre" value="<?= $resultat->disc_title ?>"
                       disabled>
            </div>
            <div class="col-12 col-md-4 ms-md-2">
                <p><label for="detailsArtiste" class="text-light"> Artist :</label></p>
                <input type="text" class="form-control col-6" id="detailsArtiste" value="<?= $resultat->artist_name ?>"
                       disabled>
            </div>
        </div>
        <div class="col-12 d-flex flex-md-row flex-column">
            <div class="col-12 col-md-4 me-2">
                <p><label for="detailsAnnee" class="text-light">Year :</label></p>
                <input type="text" class="form-control col-6" id="detailsAnnee" value="<?= $resultat->disc_year ?>"
                       disabled>
            </div>
            <div class="col-12 col-md-4 ms-md-2">
                <p><label for="detailsGenre" class="text-light">Genre :</label></p>
                <input type="text" class="form-control col-6" id="detailsGenre" value="<?= $resultat->disc_genre ?>"
                       disabled>
            </div>
        </div>
        <div class="col-12 d-flex flex-md-row flex-column">
            <div class="col-12 col-md-4 me-2">
                <p><label for="detailsLabel" class="text-light">Label :</label></p>
                <input type="text" class="form-control col-6" id="detailsLabel" value="<?= $resultat->disc_label ?>"
                       disabled>
            </div>
            <div class="col-12 col-md-4 ms-md-2">
                <p><label for="detailsPrix" class="text-light">Price :</label></p>
                <input type="text" class="form-control col-6" id="detailsPrix" value="<?= $resultat->disc_price ?>"
                       disabled>
            </div>
        </div>
        <div class="d-flex flex-column">
            <label for="detailsImage" class="mt-2 text-light">Picture</label>
            <img src="/view/assets/images/<?= $resultat->disc_picture ?>" id="detailsImage" alt="" class="w-50 mb-2 ">
        </div>
        <div class="justify-content-center col">
            <input type="hidden" value="<?= $_GET['disc_id'] ?>" name="disc_id" id="disc_id">
            <button type="submit" class="btn btn-danger" id="envoi" name="envoi" title="supprimer le disque <?= $resultat->disc_title ?>">Supprimer</button>
            <a href="/view/details_disques.php?disc_id=<?= $_GET['disc_id'] ?>" class="btn btn-outline-info">Retour aux
                détails du disque</a>
            <a href="/view/liste_disques.php" class="btn btn-outline-light">Retour à la liste des disques</a>

        </div>
    </form>
<?php } elseif (isset($suppr) and $suppr['resultat'] === true) { ?>
<!-- si le disque a bien été supprimé-->
    <div class="d-flex flex-column align-items-center">
        <h1 class="alert alert-warning">Suppression réussie</h1>
        <a href="/view/liste_disques.php" class="btn btn-outline-info" title="retournez à la liste des disques">Retour à la liste des disques</a>
        <p>Vous serez Redirigé dans <span id="compteur">5</span> secondes...</p>
    </div>


    <?php
    // redirection au bout de 5 secondes
    header("refresh: 5; url=/view/liste_disques.php");

    //sinon, si la suppression a été tentée mais a échoué
} elseif (isset($suppr) and $suppr['resultat'] === false) { ?>
    <div class="d-flex flex-column align-items-center">
        <h2 class="alert alert-danger">Un problème est survenu : <?= $suppr['message'] ?>.</h2>
        <p class="text-light">Contactez un administrateur, ou retournez a la liste des disque et retentez le processus.</p>
        <a href="/view/liste_disques.php" class="btn btn-outline-info" title="un problème est survenu : retournez à la liste des disques">Retour à la liste des disques</a>
    </div>
    <?php
}

?>
<!--script js du compteur-->
<script src="/view/assets/JavaScript/scripts.js"></script>
<?php
include $_SERVER["DOCUMENT_ROOT"] . "/view/header_footer/footer.php";
?>
