<?php

class db_records
{
    private $host = "localhost:3306";
    private $dbname = "record";
    private $charset = "UTF8";
    private $user = "root";
    private $mdp = "1234";
    private $dbRecord;

    function __construct()
    {
        $dsn = "mysql:host=$this->host,dbname=$this->dbname,charset=$this->charset";
        try {

            $this->dbRecord = new PDO($dsn, $this->user, $this->mdp);
            $this->dbRecord->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//            echo "Hello database!";

        } catch
        (PDOException $message) {
            $message->getMessage();
            echo $message . "<br>";
            $message->getCode();
            echo $message;
            die('MEURS POURRITURE CAPITALISTE');

        }
    }

    /**
     * fonction connexion base de donnée
     * @return PDO
     */
    public function getDbRecord()
    {
        return $this->dbRecord;
    }
}