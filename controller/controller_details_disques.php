<?php
require "./model/CRUD/CRUD_record.php";
//var_dump($resultat);
$conn = new db_records();
$crud = new crud($conn);
$resultat = $crud->getRecord();
$titre = "Détails de ".$resultat->disc_title;
include "./view/header_footer/header.php";
?>