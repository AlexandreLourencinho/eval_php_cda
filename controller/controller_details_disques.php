<?php
require $_SERVER["DOCUMENT_ROOT"] . "/model/CRUD/CRUD_record.php";
//var_dump($resultat);
$conn = new db_records();
$crud = new crud($conn);
$resultat = $crud->getRecord();
$titre = "Détails de " . $resultat->disc_title;
include $_SERVER["DOCUMENT_ROOT"] . "/view/header_footer/header.php";
?>