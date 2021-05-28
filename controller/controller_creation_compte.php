<?php
session_start();
if (isset($_SESSION['login'])) {
    header("location: ../view/liste_disques.php");
}
require $_SERVER['DOCUMENT_ROOT'] . "/model/crud/crud_record_users.php";
require $_SERVER['DOCUMENT_ROOT'] . "/controller/fonctions/checkForm_user.php";

if (isset($_POST['envoi'])) {
    $tableauFormUser = [
        'nom' => $_POST['nom_compte'],
        'mdp' => $_POST['mdp_compte'],
        'mdp2' => $_POST['mdp_compte_verif'],
        'mail' => $_POST['mail_compte']
    ];
    $connexion = new db_records();
    $crud_record_users = new crud_record_users($connexion);

    $erreurs = checkFormUser($tableauFormUser['nom'], $tableauFormUser['mdp'], $tableauFormUser['mdp2'], $tableauFormUser['mail']);
    if(!isset($erreurs['nom'])){
        $nbNoms = $crud_record_users->rechercheNom($tableauFormUser['nom']);
        if($nbNoms['0']!=0){
            // gestion nom deja pris
            $erreurs['nom']='Ce nom de compte est déjà utilisé, veuillez en choisir un autre.';
        }
    }
    if(!isset($erreurs['mail'])){
        $nbMails= $crud_record_users->rechercheMail(($tableauFormUser['mail']));
        if($nbMails['0']!=0){
            // gestion nom deja pris
            $erreurs['mail']='Cette adresse éléctronique est déjà utilisée par un autre compte. Si vous avez oublié votre mot de passe, utilisez la fonction pour retourver son mdp';
        }
    }

    if (count($erreurs) === 0) {

        $mdp = password_hash($tableauFormUser['mdp'], PASSWORD_DEFAULT);
        $requete = $crud_record_users->createUser($tableauFormUser['nom'], $mdp, $tableauFormUser['mail']);
    }

}


$titre = 'Création d\'un nouveau compte utilisateur';
include $_SERVER['DOCUMENT_ROOT'] . "/view/header_footer/header.php";
?>