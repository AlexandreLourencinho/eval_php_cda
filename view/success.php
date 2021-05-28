<?php
session_start();
$titre = "connexion réussie";
include $_SERVER['DOCUMENT_ROOT'] . "/view/header_footer/header.php";
if (isset($_SESSION['login'])) {
    ?>

    <div class="d-flex flex-column">
        <div>
            <h1 class="alert alert-success">Connexion réussie !</h1>
        </div>
        <div>
            <p>Vous allez être redirigé dans les 5 secondes...</p>
        </div>
        <a href="/view/liste_disques.php" class="btn btn-info">Aller à la liste des disques</a>
    </div>
    <?php
    header("refresh: 5; url=liste_disques.php");
    ?>

    <?php
} else {
    session_destroy();
//    die;
    header("location: connexion.php");
}
?>



<?php
include $_SERVER['DOCUMENT_ROOT'] . "/view/header_footer/footer.php";
?>
