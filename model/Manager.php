<?php
class Manager
{
    private $host = "pj1468350-001.eu.clouddb.ovh.net";
    private $dbname = "sakila";
    private $dbusername = "Utilisateur";
    private $dbpassword = "Azer456123789";
    private $port = "35207";
// A chaque fois que j'utilise les nom des variables rien ne fonctionne. J'ai fini par mettre en dure les variables
    protected function db_connection()
    {
        try {
            //$conn = new PDO("mysql:host=$this->$host;port=$this->$port;dbname=$this->$dbname",$this->$dbusername, $this->$dbpassword);
            $conn = new PDO(
                "mysql:host=pj1468350-001.eu.clouddb.ovh.net;port=35207;dbname=sakila",
                "Jonathan",
                "Azer456123789"
            );
        } catch (PDOException $pe) {
            die(
                "<br>Erreur de conenxion sur $dbname chez $host :" .
                    $pe->getMessage()
            );
        }

        return $conn;
    }
}

