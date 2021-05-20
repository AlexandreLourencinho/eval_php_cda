<?php
include "./controller/fonctions/checkForm.php";
$tableTypesMimes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff","image/bmp","image/gif");
$regexTab = [
    'titre'=>'#[<\/`\'"\>]#',
    'artiste'=>'#[<\/`\'"\>]#',
    'annee'=>'#([^0-9] | ^[0-9]{1,3}$ | [0-9]{5,})#x',
    'genre'=>'#[<\/`\'"\>]#',
    'label'=>'#[<\/`\'"\>]#',
    'prix'=>'#[^0-9.]#'];
//var_dump($_POST);
if(isset($_GET['disc_id'])){
    $id = $_GET['disc_id'];
}
else{
    $id = $_POST['disc_id'];
}
//var_dump($id);
if(isset($_POST['envoi']))
{
    $tableauForm=array('titre'=>$_POST['titre'],
        'artiste'=>$_POST['artiste'],
        'annee'=>$_POST['annee'],
        'genre'=>$_POST['genre'],
        'label'=>$_POST['label'],
        'prix'=>$_POST['prix']);
    $titre = $_POST['titre'];
//    var_dump($_POST['image']);
//    var_dump($titre);
//    var_dump($_FILES['image']);
//    var_dump($tableauForm);
    $verifform=checkForm($regexTab,$tableauForm);
    // On met les types autorisés dans un tableau (ici pour une image)
    if(is_uploaded_file($_FILES['image']['tmp_name'])) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $typeMime = finfo_file($finfo, $_FILES['image']['tmp_name']);
        finfo_close($finfo);
        var_dump($_FILES['image']);
        if (in_array($typeMime, $tableTypesMimes)) {
            /* Le type est parmi ceux autorisés, donc OK, on va pouvoir
               déplacer et renommer le fichier */
            $nouveaunom=$titre;
            move_uploaded_file($_FILES['image']['tmp_name'], "./view/assets/images/".$titre.".jpg");
            chmod("./view/assets/images/".$titre.".jpg", 0444);
        } else {
            $verifform['image']="type de fichier non autorisé";
        }
    }
    var_dump($verifform);
}
require "./model/CRUD/CRUD_record.php";
//var_dump($resultat);
$conn = new db_records();
$crud = new crud($conn);
$resultat = $crud->getRecord();
$resultat2 = $crud->getArtists();
$titre = "modification de ".$resultat->disc_title;
include "./view/header_footer/header.php";
?>

