<?php
require "./model/connexion_db/db_records.php";

class crud
{
    private $db;

    function __construct($connection)
    {
        $this->db = $connection->getDbRecord();
    }


    /**
     * fonction listing tous les disques
     * @return Exception
     */
    public function read_all_records()
    {

        try {
            $requete = $this->db->query("SELECT * FROM record.disc INNER JOIN record.artist ON disc.artist_id=artist.artist_id");
            $resultat = $requete->fetchAll(PDO::FETCH_OBJ);
            return $resultat;

        } catch (Exception $message) {
            echo $message->getMessage() . "<br>";
            echo $message->getCode() . "<br>";
            return $message;
        }
    }

    /**
     * fonction qui donne le nombre des diques pour l'affichage sur la page de liste
     * @return mixed
     */
    public function nbDisques()
    {
        $requete = $this->db->query("SELECT COUNT(*) FROM record.disc");
        $resultat = $requete->fetch();
        return $resultat;
    }

    /**
     * fonction qui donne le détail d'un disque pour la page details_disques.php
     * @return mixed
     */
    public function getRecord()
    {
        $requete = $this->db->prepare('SELECT * FROM record.disc INNER JOIN record.artist ON disc.artist_id=artist.artist_id WHERE disc.disc_id=:disc_id');
        if (isset($_POST['disc_id'])) {
            $idart = $_POST['disc_id'];
        } else {
            $idart = $_GET['disc_id'];
        }
//var_dump($idart);
        $requete->bindValue(":disc_id", $idart, PDO::PARAM_INT);
        $requete->execute();
        $resultat = $requete->fetch(PDO::FETCH_OBJ);
        return $resultat;
    }

    /**
     * avoir tous les artistes pour le menu déroulant
     * @return mixed
     */
    public function getArtists()
    {
        $requete = $this->db->query('SELECT artist_name,artist_id FROM record.artist');
        $resultat = $requete->fetchAll(PDO::FETCH_OBJ);
        return $resultat;
    }

    public function ajouterDisque($titre, $artiste, $annee, $genre, $label, $prix, $image)
    {
        try {

            $requete = $this->db->prepare("INSERT INTO record.disc(disc_title, disc_year, disc_picture, disc_label, disc_genre, disc_price, artist_id) 
                                            VALUES (:titre, :annee, :image, :label, :genre, :prix, :artiste)");
            $requete->bindValue(":titre", $titre, PDO::PARAM_STR);
            $requete->bindValue(":annee", $annee, PDO::PARAM_INT);
            $requete->bindValue(":label", $label, PDO::PARAM_STR);
            $requete->bindValue(":artiste", $artiste, PDO::PARAM_INT);
            $requete->bindValue(":genre", $genre, PDO::PARAM_STR);
            $requete->bindValue(":prix", $prix, PDO::PARAM_STR);
            $requete->bindValue(":image", $image, PDO::PARAM_STR);

            if ($requete->execute()) {
                return array('resultat' => true, 'message' => 'insertion réussie');
            } else {
                return array('resultat' => false, 'message' => 'insertion échouée');
            }
        } catch (Exception $message) {
            $message->getMessage();
            $message->getCode();
            return array('resultat' => false, 'message' => $message);
        }
    }

    public function supprimerDisque($disc_id)
    {
        try {
            $requete = $this->db->prepare('DELETE FROM record.disc WHERE disc_id=:disc_id');
            $requete->bindValue(":disc_id", $disc_id, PDO::PARAM_INT);
            if ($requete->execute()) {
                return array('resultat' => true, 'message' => 'Suppression réussie');
            } else {
                return array('resultat' => false, 'message' => 'Suppression échouée');
            }

        } catch (Exception $message) {
            $message->getMessage();
            $message->getCode();
            return array('resultat' => false, 'message' => $message);
        }

    }

//    public function modifierDisque(){
//        try {
//            $requete = $this->db->prepare('UPDATE record.disc SET disc_title=:titre, disc_year = :annee, disc_picture=:image,
//                       disc_label = :label, disc_genre = :genre,disc_price = :prix, artist_id = :artiste WHERE disc_id=:disc_id');
//            $requete->bindValue('',$);
//            $requete->bindValue('',$);
//            $requete->bindValue('',$);
//            $requete->bindValue('',$);
//            $requete->bindValue('',$);
//            $requete->bindValue('',$);
//            $requete->bindValue('',$);
//            $requete->bindValue('',$);
//            if($requete->execute()){
//                return array('resultat'=>true, 'message'=>'Modification réussie');
//            }
//            else{
//                return array('resultat'=>false,'message'=>'Echec de la modification');
//            }
//
//        }
//        catch (Exception $message){
//            $message->getMessage();
//            $message->getCode();
//            return array('resultat'=>false, 'message'=>$message);
//        }



//    }

}


?>