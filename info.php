<?php
$mdp='1234';
var_dump($mdp);
$mdp2=password_hash('1234',PASSWORD_DEFAULT);
var_dump($mdp2);
$mdp3=password_hash($mdp,PASSWORD_DEFAULT);
var_dump($mdp3);
$resultat=password_verify($mdp,$mdp2);
var_dump($resultat);
//phpinfo();
// page info.php, a ignorer ?>