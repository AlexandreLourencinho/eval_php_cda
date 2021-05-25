<?php
include $_SERVER["DOCUMENT_ROOT"] . "/controller/fonctions/checkForm.php";
require $_SERVER["DOCUMENT_ROOT"] . "/model/CRUD/CRUD_record.php";
// création d'une nouvelle instance de connexion a la bdd + crud avec cette connexion a la bdd
$conn = new db_records();
$crud = new crud($conn);
//variables par défaut si pas d'image
$nouveaunom = null;
$img = false;

// si le formulaire a été envoyé par la méthode POST
if (isset($_POST['envoi'])) {
    //tableau des réponses du formulaire
    $tableauForm = array('titre' => $_POST['titre'],
        'artiste' => $_POST['artiste'],
        'annee' => $_POST['annee'],
        'genre' => $_POST['genre'],
        'label' => $_POST['label'],
        'prix' => $_POST['prix']);
    // utile pour l'image
    $title = $_POST['titre'];

    // appel de la fonction qui vérifiera la teneur des champs du formulaire selon les regex, et stockera les eventuelles
    // erreurs dans un tableau.
    $verifform = checkForm($regexTab, $tableauForm);

    //is_ploaded_file sert a savoir si un fichier a été uploadé ou non : semble mieux marcher que empty() ou isset()
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        // ouverture du fihier et détermination de son type mime
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $typeMime = finfo_file($finfo, $_FILES['image']['tmp_name']);
        finfo_close($finfo);
        // si le type mime du fichier correspond au résultat attendu, la variable $img passe a true, et le nouveau nom de l'image
        // est définit.
        if (in_array($typeMime, $tableTypesMimes)) {
            /* Le type est parmi ceux autorisés, donc OK */
            $tempvar = uniqid();
            $nouveaunom = $tempvar . ".jpg";
            $img = true;
        } else {
            // si le type ne correspond pas, on insert dans le tableau d'erreur le message d'erreur ici bas.
            $verifform['image'] = "type de fichier non autorisé";
        }
    }
    // si le tableau $verifform est vide, aka ne contient pas d'erreur
    if (count($verifform) === 0) {
        // ici, si il y a une image et qu'elle a le bon type mime, utilisation de la variable $img passée a true
        // et déplacement du fichier vers le dossier correspondant, + attribution des droits en lecture seule (normalement ^^)
        if ($img === true) {
            move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER["DOCUMENT_ROOT"] . "/view/assets/images/" . $nouveaunom);
//            chmod("./view/assets/images/" . $title . ".jpg", 0444);
        }
        // execution de la requête d'insertion avec les données du POST, et le nouveau nom qui sera celui de l'image, ou null
        //s'il n'y en a pas eu d'uploadé
        $insertion = $crud->ajouterDisque($tableauForm['titre'], $tableauForm['annee'], $nouveaunom, $tableauForm['label'], $tableauForm['genre'], $tableauForm['prix'], $tableauForm['artiste'],);
        // la fonction ajouterDisque() renvoi un tableau avec un message et false ou true. ici, si false est retourné, on récupère le message d'erreur
        // et on l'affiche, avec un juron bien senti parce que ça veut dire qu'il y a un problème et qu'on est pas content
        if ($insertion['resultat'] === false) {
            echo $insertion['message'] . ' putain de merde';
        } else {
            // ici si tout va bien, bah tout va bien
            echo $insertion['message'];
        }

    }

}
// appel de la fonction qui récupère les artistes, titre, puis appel du header
$resultat = $crud->getArtists();
$titre = "formulaire d'ajout de disques";
include $_SERVER["DOCUMENT_ROOT"] . "/view/header_footer/header.php";
?>