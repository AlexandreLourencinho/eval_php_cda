<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("location: ../view/destroy.php");
}

if(!isset($_GET['disc_id']) and !isset($_POST['disc_id'])){
    header('location: ../view/liste_disques.php');
}
// appel des pages utilisées
include $_SERVER["DOCUMENT_ROOT"] . "/controller/fonctions/checkForm.php";
require $_SERVER["DOCUMENT_ROOT"] . "/model/CRUD/CRUD_record.php";

// nouvelle classe base de donnée et crud
$conn = new db_records();
$crud = new crud($conn);

//appel des deux fonctions utilisées du crud
$resultat = $crud->getRecord();
$resultat2 = $crud->getArtists();


// définition des variables utilisée plus tard, la variable img pour la gestion des images; et le tableau d'erreurs du formulaire
$img = false;
$verifform = [];


// recupère l'id par get ou post selon si arrivé via la page détails ou via l'envoi du formulaire mais erreur de champ
if (isset($_GET['disc_id'])) {
    $id = $_GET['disc_id'];
} else {
    $id = $_POST['disc_id'];
}


// début gestion du formulaire si celui-ci est envoyé
if (isset($_POST['envoi'])) {
    // tableau des valeurs du formulaire
    $tableauForm = array('titre' => $_POST['titre'],
        'artiste' => $_POST['artiste'],
        'annee' => $_POST['annee'],
        'genre' => $_POST['genre'],
        'label' => $_POST['label'],
        'prix' => $_POST['prix']);


    // tempvar servira a nommer l'image si elle est modifée
    $tempvar = uniqid();
    // le nouveau nom de l'image sera donc un nom unique
    $nouveaunom = $tempvar . ".jpeg";

    // appel de la fonction pour vérifier le formulaire, cf page correspondante
    $verifform = checkForm($regexTab, $tableauForm);

    // is uploaded file permet de detecter si une image est uploadé ou pas dans $_FILES et donc la gérer
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        //crée un nouvel objet finfo avec les type mime
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        // récupère le type MIME du fichier uploadé
        $typeMime = finfo_file($finfo, $_FILES['image']['tmp_name']);
        //ferme la ressource finfo
        finfo_close($finfo);

        // vérifie si le type mime du fichier correspondant a ceux attendus
        if (in_array($typeMime, $tableTypesMimes)) {
            // si oui, img passe a true - utile pour plus tard
            $img = true;
        } else {
            // si non, remplissage du tableau d'erreur
            $verifform['image'] = "type de fichier non autorisé";
        }
    }
}


// vérifie si tableau d'erreur est vide ou pas ET que le formulaire à bien été envoyé
if (count($verifform) === 0 && isset($_POST['envoi'])) {
    //gestion de l'image si la variable img est a true, et donc si une image est uploadé ET du bon type mime
    if ($img == true) {
        // déplace et renome le fichier
        if (move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER["DOCUMENT_ROOT"] . "/view/assets/images/" . $nouveaunom)) {
            echo "image ok";
        } else {
            // erreur si problème au move upload file
            $verifform['image'] = "problème d'upload";
        }

        //statement qui appelle la fonction qui modifie le disc_picture du disque correspondant
        $stmt = $crud->modifImage($nouveaunom, $id);

        // si problème
        if ($stmt['resultat'] === false) {
            echo $stmt['message'];
        } else {
            echo $stmt['message'];
        }
    }
    // appel de la fonction crud qui permet de modifier les infos dans la bdd --cf crud
    $modification = $crud->modifierDisque($tableauForm['titre'], $tableauForm['annee'], $tableauForm['label'], $tableauForm['genre'], $tableauForm['prix'], $tableauForm['artiste'], $id);
}


// titre et appel du header
$titre = "modification de " . $resultat->disc_title;
include $_SERVER["DOCUMENT_ROOT"] . "/view/header_footer/header.php";
?>

