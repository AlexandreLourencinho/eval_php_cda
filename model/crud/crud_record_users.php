<?php
//appel de la page BDD
require $_SERVER["DOCUMENT_ROOT"] . "/model/connexion_db/db_records.php";

//définition de la classe crud
class crud_user
{

    // instanciation d'objet base de donnée
    private $db;

    //construction de l'objet base de donnée pour ce crud : sera appelé a chaque fois
    function __construct($conn)
    {
        $this->db = $conn->getDbRecord;
    }


    public function createUser($nom,$mdp,$mail)
    {

        $requete = $this->db->prepare("INSERT INTO record.utilisateurs(Nom_utilisateur, mdp_utilisateur, mail_utilisateur) VALUES(:nom,:mdp,:mail)");
        $requete->bindValue(":nom",$nom,PDO::PARAM_STR);
        $requete->bindValue(":mdp",$mdp,PDO::PARAM_STR);
        $requete->bindValue(":mail",$mail,PDO::PARAM_STR);
        $requete->execute();

    }


}