<?php
require "./model/CRUD/CRUD_record.php";
//var_dump($resultat);
$conn = new db_records();
$crud = new crud($conn);
$resultat = $crud->getRecord();

if (!empty($_POST)) {
    $disc_id = $_POST['disc_id'];
    $suppr = $crud->supprimerDisque($disc_id);
}


$titre = "suppression de " . $resultat->disc_title;
include "./view/header_footer/header.php";
?>