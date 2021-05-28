<?php
date_default_timezone_set("Europe/Paris");

if (isset($_POST['envoi'])) {
    require $_SERVER["DOCUMENT_ROOT"] . '/model/crud/crud_record_users.php';
    $conn = new db_records();
    $crud_user = new crud_record_users($conn);
    $resultat = $crud_user->rechercheMailMdpPerdu($_POST['mail_compte']);
    var_dump($resultat);
//    die;
    if ($resultat === false) {
        $message = "pas de mail";
        echo $message;
//        die;
    } else {
        $date = new DateTime();
        $time=$date->getTimestamp();
//        var_dump($time);
//        die;
        $token = $crud_user->tokenMdp($time,$_POST['mail_compte']);
//        var_dump($token);
//        die;
        if($token['resultat']===true) {
            mail('test@mail.fr', "récupération de mdp", "utilisez ce lien : http://localhost:8005/view/modifier_le_mdp.php?token=".$time, array('From' => 'cemoi@velvetrecord.com', 'Reply-To' => 'test@sfr.fr', 'X-Mailer' => 'PHP/' . phpversion()));
            echo "mail ok";
            var_dump($token);
//            die;
        }
    }
}


$titre = "mot de passe oublié";
include $_SERVER['DOCUMENT_ROOT'] . "/view/header_footer/header.php";