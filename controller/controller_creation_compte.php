<?php
require $_SERVER['DOCUMENT_ROOT']."/model/crud/crud_record_users.php";
if(isset($_POST['envoi']) && $_POST['mdp_compte'] === $_POST['mdp_compte_verif']) {
    $tableauFormUser = [
        'nom_compte'=>$_POST['nom_compte'],
        'mdp_compte'=>$_POST['mdp_compte'],
        'mdp_compte_verif'=>$_POST['mdp_compte_verif'],
        'mail_compte'=>$_POST['mail_compte']
    ];
    if ($tableauFormUser['mdp_compte'] === $tableauFormUser['mdp_compte_verif'])
    {
        //verif regex & co

        //hash mdp
        $mdp=$_POST['mdp_compte'];
        $connexion = new db_records();
        $crud_user = new crud_user($connexion);
        $requete = $crud_user->createUser($tableauFormUser['nom_compte'],$mdp,$tableauFormUser['mail_compte']);
    }
    else{
        //tableau erreur mdp
    }


}





















$titre = 'Création d\'un nouveau compte utilisateur';
include $_SERVER['DOCUMENT_ROOT']."/view/header_footer/header.php";
?>