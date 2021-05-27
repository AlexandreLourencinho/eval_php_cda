<?php
// appel du crud
require $_SERVER["DOCUMENT_ROOT"] . "/model/CRUD/CRUD_record.php";

// instanciation d'un nouvel objet de base de donnée, et d'une nouvelle classe crud avec cet objet base de donnée en paramètre
$connexion = new db_records;
$crud = new crud($connexion);

//appel des fonctions du nombre de  disque et qui liste tous les détails de tous les disques (cf crud)
$resultat = $crud->read_all_records();
$resultatnombre = $crud->nbDisques();

// titre et header
$titre = " liste des diques";
include $_SERVER["DOCUMENT_ROOT"] . "/view/header_footer/header.php";
?>