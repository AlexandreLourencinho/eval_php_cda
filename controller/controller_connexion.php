<?php
var_dump($_POST);
if(isset($_POST['envoi'])){
    require $_SERVER['DOCUMENT_ROOT'].'/model/crud/crud_record_users.php';
    $conn=new db_records();
    $crud_user= new crud_user($conn);
    $logs = $crud_user->rechercheUtilisateurs($_POST['nom_compte']);
//    var_dump($logs);
//    die;
    if(password_verify($_POST['mdp_compte'],$logs->mdp_utilisateur)){
//        echo 'ok';
//        die;
//        gérer connexion avec session_start()
    }
    else{
//        echo 'pas ok';
//        die;
        // gérer mdp différent
    }

}
































$titre = 'Vous connecter à votre compte';
include $_SERVER['DOCUMENT_ROOT']."/view/header_footer/header.php";
?>