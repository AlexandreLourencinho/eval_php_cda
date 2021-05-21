<?php
//echo "<pre>" . $_SERVER["DOCUMENT_ROOT"] . "\n". __FILE__ . "\n" . getcwd() . "\n</pre>";
$titre = " liste des diques";
include $_SERVER["DOCUMENT_ROOT"] . "/view/header_footer/header.php";
require $_SERVER["DOCUMENT_ROOT"] . "/model/CRUD/CRUD_record.php";
$connexion = new db_records();
$crud = new crud($connexion);
$resultat = $crud->read_all_records();
$resultatnombre = $crud->nbDisques();
?>