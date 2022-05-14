<?php
require_once("model/Manager");

class UserManager extends Manager
{
    public function getuser($user){
        $db = db_connect();
        $req = $db->prepare("SELECT username, password FROM staff WHERE username = ?");
        $req->execute(array($user));
        $user_found = $req->fetch();

    return $user_found;
    }
}
