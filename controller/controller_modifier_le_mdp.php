<?php
date_default_timezone_set("Europe/Paris");

//var_dump($_GET['token']);
// a faire : modifier le mdp là ou est le token dans la bdd et avant ça le comparer avec le timestamp du moment et définir
// un temps d'utilisation max du mail (mettons 15 minutes)
if (isset($_GET['token'])) {
    $modif = false;
    //recup du token + forcé en int
    $token = intval($_GET['token']);
    //crud user + recup du compte concerné (false si non)
    require $_SERVER['DOCUMENT_ROOT'] . '/model/crud/crud_record_users.php';
    $conn = new db_records();
    $crud_user = new crud_record_users($conn);
    $resultat = $crud_user->recupMdp($_GET['token']);
    //si le token est bien retrouvé
    if ($resultat != false) {

        //recup du token de la bdd sous forme int
        $tokentimestamp = intval($resultat->token_recup);


        //recup la date du timestamp et la date du jour et en fait la différence
        $datejour = new DateTime();
        $tokendatetime = $datejour->setTimestamp($tokentimestamp);
        $now = new DateTime();
        $interval = $now->diff($tokendatetime, true);

        //test si lien expiré
        $testminutes = intval($interval->format('%i'));
        $testheures = intval($interval->format('%h'));
        $testjours = intval($interval->format('%d'));
        $testmois = intval($interval->format('%m'));
        $testannee = intval($interval->format('%y'));

        if ($testminutes >= 15 or $testheures > 1 or $testjours != 0 or $testmois != 0 or $testannee != 0) {
            $message = "le lien a expiré. veuillez faire une nouvelle demande de réinitialisation. Vous serez redirigé vers la page de connexion dans les 5 secondes.";
        } else {
            $modif = true;
            $message = 'Veuillez renseigner votre nouveau mot de passe.';
        }
    } //si le token ne correspond a rien dans la bdd : comme si lien a expiré
    else {
        $message = "le lien a expiré. veuillez faire une nouvelle demande de réinitialisation. Vous serez redirigé vers la page de connexion dans les 5 secondes.";
    }
}

// si formulaire envoyé
if (isset($_POST['envoi']) and isset($_POST['token']) and $_POST['aut'] == true) {
    if ($_POST['mdp'] === $_POST['mdp2']) {
        $valide = true;
        require $_SERVER['DOCUMENT_ROOT'] . '/model/crud/crud_record_users.php';
        $conn = new db_records();
        $crud_user = new crud_record_users($conn);
        $resultat = $crud_user->recupMdp($_POST['token']);
        //si le token est bien retrouvé

        //recup du token de la bdd sous forme int
        $tokentimestamp = intval($resultat->token_recup);


        //recup la date du timestamp et la date du jour et en fait la différence
        $datejour = new DateTime();
        $tokendatetime = $datejour->setTimestamp($tokentimestamp);
        $now = new DateTime();
        $interval = $now->diff($tokendatetime, true);

        //test si lien expiré
        $testminutes = intval($interval->format('%i'));
        $testheures = intval($interval->format('%h'));
        $testjours = intval($interval->format('%d'));
        $testmois = intval($interval->format('%m'));
        $testannee = intval($interval->format('%y'));

        if ($testminutes >= 15 or $testheures > 1 or $testjours != 0 or $testmois != 0 or $testannee != 0) {
            $valide = false;
        } elseif (!preg_match('#^(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$#', $_POST['mdp'])) {
            $valide = false;
        } else if (strlen($_POST['mdp']) < 8) {
            $valide = false;
        }
        if ($valide === true) {
            $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
            $result = $crud_user->changeMdp($_POST['token'], $mdp);
            if ($result['resultat'] === true) {
                $modification = 'Modification du mot de passe réussie. vous serez redirigé dans 5 secondes vers la page de connexion.';
            }
        }
    }
}

$titre = "modifier le mdp";
include $_SERVER['DOCUMENT_ROOT'] . "/view/header_footer/header.php";
?>