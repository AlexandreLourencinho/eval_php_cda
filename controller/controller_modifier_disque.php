<?php
include $_SERVER["DOCUMENT_ROOT"]."/controller/fonctions/checkForm.php";
require $_SERVER["DOCUMENT_ROOT"]."/model/CRUD/CRUD_record.php";
$conn = new db_records();
$crud = new crud($conn);
$resultat = $crud->getRecord();
$resultat2 = $crud->getArtists();

$img = false;
$verifform = [];

if (isset($_GET['disc_id'])) {
    $id = $_GET['disc_id'];
} else {
    $id = $_POST['disc_id'];
}

if (isset($_POST['envoi'])) {
    $tableauForm = array('titre' => $_POST['titre'],
        'artiste' => $_POST['artiste'],
        'annee' => $_POST['annee'],
        'genre' => $_POST['genre'],
        'label' => $_POST['label'],
        'prix' => $_POST['prix']);
    $tempvar = uniqid();
    $nouveaunom = $tempvar.".jpeg";
    $verifform = checkForm($regexTab, $tableauForm);
    // On met les types autorisés dans un tableau (ici pour une image)
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $typeMime = finfo_file($finfo, $_FILES['image']['tmp_name']);
        finfo_close($finfo);
//        var_dump($_FILES['image']);
        if (in_array($typeMime, $tableTypesMimes)) {
            /* Le type est parmi ceux autorisés, donc OK, on va pouvoir
               déplacer et renommer le fichier */
//            $nouveaunom = $title . ".jpg";
            $img = true;
        } else {
            $verifform['image'] = "type de fichier non autorisé";
        }
    }
//    var_dump($verifform);
}
//var_dump($tableauForm);
if (count($verifform) === 0 && isset($_POST['envoi'])) {
    if ($img == true) {
        if(move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER["DOCUMENT_ROOT"]."/view/assets/images/".$nouveaunom)){
            echo "image ok";
        }
        else{
           $verifform['image']="problème d'upload";
        }
//        chmod("./view/assets/images/".$nouveaunom, 0444);
        $stmt = $crud->modifImage($nouveaunom,$id);
        if($stmt['resultat']=== false){
            echo $stmt['message'].' putain de merde';
        }
        else{
            echo $stmt['message'];
        }
    }
    $modification = $crud->modifierDisque($tableauForm['titre'], $tableauForm['artiste'], $tableauForm['annee'], $tableauForm['genre'], $tableauForm['label'], $tableauForm['prix'],  $id);
    if ($modification['resultat'] === false) {
        echo $modification['message'];
    } else {
        echo $modification['message'];
    }
}


//var_dump($_POST);
$titre = "modification de " . $resultat->disc_title;
include $_SERVER["DOCUMENT_ROOT"]."/view/header_footer/header.php";
?>

