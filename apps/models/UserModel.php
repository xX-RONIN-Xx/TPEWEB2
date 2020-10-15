<?php

class UserModel
{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_products;charset=utf8', 'root', '');
    }

    function getUser($user)
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE email=?");
        $query->execute(array($user));
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
