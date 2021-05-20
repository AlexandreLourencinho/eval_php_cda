<?php
$titre = " liste des diques";
include "./view/header_footer/header.php";
require "./model/CRUD/CRUD_record.php";
$connexion = new db_records();
$crud = new crud($connexion);
$resultat = $crud->read_all_records();
$resultatnombre = $crud->nbDisques();
?>