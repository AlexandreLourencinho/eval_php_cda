<?php
date_default_timezone_set("Europe/Paris");
$modif = true;
//var_dump($_GET['token']);
// a faire : modifier le mdp là ou est le token dans la bdd et avant ça le comparer avec le timestamp du moment et définir
// un temps d'utilisation max du mail (mettons 15 minutes)
if (isset($_GET['token'])) {
    //recup du token + forcé en int
    $token = intval($_GET['token']);
    //crud user + recup du compte concerné (false si non)
    require $_SERVER['DOCUMENT_ROOT'] . '/model/crud/crud_record_users.php';
    $conn = new db_records();
    $crud_user = new crud_record_users($conn);
    $resultat = $crud_user->recupMdp($_GET['token']);
//    var_dump($resultat);

    //recup du t oken de la bdd sous forme int
    $tokentimestamp = intval($resultat->token_recup);
//    var_dump($tokentimestamp);

    //recup la date du timestamp et la date du jour et en fait la différence
    $datejour = new DateTime();
    $tokendatetime = $datejour->setTimestamp($tokentimestamp);
    $now = new DateTime();
    $interval = $now->diff($tokendatetime, true);

    $testminutes = intval($interval->format('%i'));
    $testheurs = intval($interval->format('%h'));
    $testjours = intval($interval->format('%d'));
    $testmois = intval($interval->format('%m'));
    $testannee = intval($interval->format('%y'));

    if ($testminutes >= 15 or $testheurs > 1 or $testjours != 0 or $testmois != 0 or $testannee != 0) {

        $modif = false;
        $message = "le lien a expiré. veuillez faire une nouvelle demande de réinitialisation. Vous serez redirigé vers la page de connexion dans les 5 secondes.";
//        die;
    } else {
        $message = 'Veuillez renseigner votre nouveau mot de passe.';
    }
}
if (isset($_POST['envoi']) and isset($_POST['token']) and $_POST['aut'] == true) {
    if ($_POST['mdp'] === $_POST['mdp2']) {
        $erreur = true;
        require $_SERVER['DOCUMENT_ROOT'] . '/model/crud/crud_record_users.php';
        $conn = new db_records();
        $crud_user = new crud_record_users($conn);
        if (!preg_match('#^(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$#', $_POST['mdp'])) {
            $erreur = false;
        } else if (strlen($_POST['mdp']) < 8) {
            $erreur = false;
        }
        if ($erreur === true) {
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