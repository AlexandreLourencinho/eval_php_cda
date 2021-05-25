<?php
function checkForm(array $regex, array $tabPost)
{
    $erreurs = [];
    foreach ($tabPost as $name => $value) {
        if (!empty($tabPost[$name])) {
            if (preg_match($regex[$name], $tabPost[$name])) {
                $erreurs[$name] = 'Caractère non valide';
            }
        } else {
            $erreurs[$name] = 'tous les champs sont obligatoires';
        }
    }
    return $erreurs;

}
// tableau des types mimes utilisé dans modifier et ajouter
$tableTypesMimes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff", "image/bmp", "image/gif");

// le tableau des regex utilisées pour le contrôle des champs
$regexTab = [
    'titre' => '/[<\/`\'"\>#]/',
    'artiste' => '/[<\/`\'"\>]/',
    'annee' => '#([^0-9] | ^[0-9]{1,3}$ | [0-9]{5,})#x',
    'genre' => '/[<\`\'"\>#]/',
    'label' => '/[<\/`\'"\>#]/',
    'prix' => '#[^0-9.]#'];

?>