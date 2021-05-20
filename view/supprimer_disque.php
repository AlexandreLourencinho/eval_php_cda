<?php
include $_SERVER["DOCUMENT_ROOT"]."/controller/controller_supprimer_disques.php";
if (!isset($suppr)) {
    ?>

    <form action="<?= $_SERVER['PHP_SELF'] ?>"
          class="form-group col-10 d-flex flex-column align-items-start justify-content-start" method="post" id="supprform">
        <p class="h3 text-center">Suppression</p>
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
        <div class="justify-content-center col">
            <input type="hidden" value="<?= $_GET['disc_id'] ?>" name="disc_id" id="disc_id">
            <button type="submit" class="btn btn-danger" id="envoi" name="envoi">Supprimer</button>
            <a href="/view/details_disques.php?disc_id=<?= $_GET['disc_id'] ?>" class="btn btn-primary">Retour aux
                détails du disque</a>
            <a href="/view/liste_disques.php" class="btn btn-primary">Retour à la liste des disques</a>

        </div>
    </form>
<?php } elseif (isset($suppr) and $suppr['resultat'] === true) { ?>

    <div class="d-flex flex-column align-items-center">
        <h1 class="alert alert-warning">Suppression réussie</h1>
        <a href="/view/liste_disques.php" class="btn btn-info">Retour à la liste des disques</a>
        <p>Vous serez Redirigé dans <span id="compteur">5</span> secondes...</p>
    </div>


    <?php
    header("refresh: 5; url=/view/liste_disques.php");
}elseif(isset($suppri) and $suppr['resultat']===false){ ?>
<div class="d-flex flex-column align-items-center">
    <h2 class="alert alert-danger">Un problème est survenu : <?= $suppr['message'] ?>.</h2>
    <p>Contactez un administrateur, ou retournez a la liste des disque et retentez le processus.</p>
    <a href="/view/liste_disques.php" class="btn btn-info">Retour à la liste des disques</a>
</div>
    <?php
}

?>

<script src="/view/assets/JavaScript/scripts.js"></script>
<?php
include $_SERVER["DOCUMENT_ROOT"]."/view/header_footer/footer.php";
?>
