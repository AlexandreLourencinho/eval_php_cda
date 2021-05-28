<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location: destroy.php");
}
else{
    require $_SERVER['DOCUMENT_ROOT'] . '/model/crud/crud_record_users.php';
    $conn = new db_records();
    $crud_record_users = new crud_record_users($conn);
    $logs = $crud_record_users->rechercheUtilisateurs($_SESSION['login']);
    $titre= $_SESSION['login'];
    include $_SERVER['DOCUMENT_ROOT']."/view/header_footer/header.php";
  ?>

    <h1>bonjour <?= $logs->nom_utilisateur ?></h1>
    <h1>Votre Adresse mail est : <?= $logs->mail_utilisateur ?></h1>



































    <?php
    include $_SERVER['DOCUMENT_ROOT']."/view/header_footer/footer.php";
}

?>