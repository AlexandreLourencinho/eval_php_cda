<?php
include "./controller/controller_liste_disques.php";
?>

<div class="d-flex flex-wrap justify-content-start m-0 col-12 col-md-10">
    <div class="col-11 d-flex align-items-center ms-1 me-5">
        <h1 class="me-auto"><b>Liste des disques (<?= $resultatnombre['0']; ?>)</b></h1>
        <a class="btn btn-primary" href="/view/formulaire_ajout.php">Ajouter</a>
    </div>
    <?php
    foreach ($resultat as $disque) {
        ?>
        <div class="col-12 col-md-6 d-flex flex-lg-row mb-3 bla align-items-center border border-lg-none">
            <div class="col-6 col-lg-3 pe-2 m-0 h">
                <img src="/view/assets/images/<?= $disque->disc_picture ?>"  class=" " alt="">
            </div>
            <div class="col-6 col-md-4 d-flex flex-column align-items-center justify-content-center border">
                <div class="col-12 mb-2 mb-lg-4">
                    <span class="h5"><?= $disque->disc_title ?></span><br>
                    <span class="potitext"><b><?= $disque->artist_name ?></b></span><br>
                    <b><span>Label :</span></b><span class=""><?= $disque->disc_label ?></span><br>
                    <b><span>Year :</span></b><span class=""><?= $disque->disc_year ?></span><br>
                    <b><span>Genre :</span></b><span class=""><?= $disque->disc_genre ?></span><br>

                </div>
                <div class="col-10 mt-2 mt-md-5 mt-lg-5">
                    <a href="/view/details_disques.php?disc_id=<?= $disque->disc_id ?>" class="btn btn-primary">Détails</a>
                </div>
            </div>

        </div>
        <?php
    }
    ?>
</div>


<?php
include "./view/header_footer/footer.php";
?>
