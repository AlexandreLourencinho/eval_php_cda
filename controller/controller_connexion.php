<?php
session_start();
var_dump($_POST);
var_dump($_SESSION);
if (isset($_POST['envoi'])) {
    require $_SERVER['DOCUMENT_ROOT'] . '/model/crud/crud_record_users.php';
    $conn = new db_records();
    $crud_record_users = new crud_record_users($conn);
    $logs = $crud_record_users->rechercheUtilisateurs($_POST['nom_compte']);
    var_dump($logs);
// note : aaaaaaA8
    if ($logs != false) {
        if (password_verify($_POST['mdp_compte'], $logs->mdp_utilisateur) AND $_POST['mail_compte']==$logs->mail_utilisateur) {
//        echo 'ok';
//        die;
            $_SESSION['login'] = $logs->nom_utilisateur;
            header("location: success.php");
//            var_dump($_SESSION);
//            die;

        } else {
//        echo 'pas ok';
//        die;
            unset($_SESSION["login"]);
            if (ini_get("session.use_cookies"))
            {
                setcookie(session_name(), '', time()-42000);
            }

            session_destroy();
            $message = 'le mot de passe ou l\'adresse email est incorrect. Veuillez réessayer.';
        }
    } else {
        unset($_SESSION["login"]);
        if (ini_get("session.use_cookies"))
        {
            setcookie(session_name(), '', time()-42000);
        }
        session_destroy();
        $message = 'le nom de compte est incorrect. Veuillez réessayer.';
    }

}


$titre = 'Vous connecter à votre compte';
include $_SERVER['DOCUMENT_ROOT'] . "/view/header_footer/header.php";
?>