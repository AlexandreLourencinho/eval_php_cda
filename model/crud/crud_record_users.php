<?php
//appel de la page BDD
require $_SERVER["DOCUMENT_ROOT"] . "/model/connexion_db/db_records.php";

//définition de la classe crud
class crud_user
{

    // instanciation d'objet base de donnée
    private $db;
    /**
     * crud_user constructor.
     * @param $conn
     */
    //construction de l'objet base de donnée pour ce crud : sera appelé a chaque fois
    function __construct($conn)
    {
        $this->db = $conn->getDbRecord();
    }

    /**
     * Fonction de création de compte utilisateur
     * @param $nom
     * @param $mdp
     * @param $mail
     */
    public function createUser($nom,$mdp,$mail)
    {

        $requete = $this->db->prepare("INSERT INTO record.utilisateurs(Nom_utilisateur, mdp_utilisateur, mail_utilisateur) VALUES(:nom,:mdp,:mail)");
        $requete->bindValue(":nom",$nom,PDO::PARAM_STR);
        $requete->bindValue(":mdp",$mdp,PDO::PARAM_STR);
        $requete->bindValue(":mail",$mail,PDO::PARAM_STR);
        $requete->execute();

    }

    public function rechercheNom($nom){
        $requete=$this->db->prepare("SELECT COUNT(*) FROM record.utilisateurs WHERE Nom_utilisateur=:nom");
        $requete->bindValue(':nom',$nom,PDO::PARAM_STR);
        $requete->execute();
        $resultat=$requete->fetch();
        return $resultat;
    }

    public function rechercheMail($mail){
        $requete=$this->db->prepare("SELECT COUNT(*) FROM record.utilisateurs WHERE mail_utilisateur=:mail");
        $requete->bindValue(":mail",$mail,PDO::PARAM_STR);
        $requete->execute();
        $resultat=$requete->fetch();
        return $resultat;
    }

    public function rechercheUtilisateurs($nom){
        $requete=$this->db->prepare("SELECT * FROM record.utilisateurs WHERE nom_utilisateur=:nom");
        $requete->bindValue(':nom',$nom, PDO::PARAM_STR);
        if($requete->execute()){
            $resultat=$requete->fetch(PDO::FETCH_OBJ);
            return $resultat;
        }
        else{
            return array('resultat'=>false,'message'=>'nom d\'utilisateur ou mot de passe incorrect');
        }
    }

}