<?php
session_start();
//appel du crud
require $_SERVER["DOCUMENT_ROOT"] . "/model/CRUD/CRUD_record.php";

// instanciation nouvelle connexion à la BDD + utilisation de cette co en paramètre pour le crud
$conn = new db_records();
$crud = new crud($conn);

// appel de la fonction qui donne les détails d'un disuqe
$resultat = $crud->getRecord();

if(!isset($_GET['disc_id']) and !isset($_POST['disc_id'])){
    header('location: ../view/liste_disques.php');
}


//titre et header
$titre = "Détails de " . $resultat->disc_title;
include $_SERVER["DOCUMENT_ROOT"] . "/view/header_footer/header.php";
?>