<?php

//appel du crud
require $_SERVER["DOCUMENT_ROOT"] . "/model/CRUD/CRUD_record.php";

//instanciation nouvelle co a la BDD + utilisation de cette co en param pour le CRUD
$conn = new db_records();
$crud = new crud($conn);

//appel de la fonction qui donne les détails d'un disque
$resultat = $crud->getRecord();

//si le formulaire de suppression a b ien été envoyé, récupère l'id et lance la fonction de suppression (cf le crud)
if (!empty($_POST)) {
    $disc_id = $_POST['disc_id'];
    $suppr = $crud->supprimerDisque($disc_id);
}

// titre et header
$titre = "suppression de " . $resultat->disc_title;
include $_SERVER["DOCUMENT_ROOT"] . "/view/header_footer/header.php";
?>