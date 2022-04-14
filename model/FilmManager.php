<?php
ini_set('display_errors', 'On');

require_once("model/Manager.php");

class FilmManager extends Manager
{
    public function getfilms(){
        $db = $this->db_connection();
        $sql = "SELECT title, description, length, rental_rate, rating FROM film";
        $result = $db->query($sql);
        return $result;
    }

}
