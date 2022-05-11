<?php
ini_set('display_errors', 'On');

require_once("model/Manager.php");

class FilmManager extends Manager
{
    public function getfilms(){
        $db = $this->db_connection();
        $sql = "SELECT film_id, title, description, length, rental_rate, rating FROM film LIMIT 30";
        $result = $db->query($sql);
        return $result;
    }


}
