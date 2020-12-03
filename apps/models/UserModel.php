<?php

class UserModel
{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_products;charset=utf8', 'root', '');
    }

    function getUser($email)
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE email=?");
        $query->execute(array($email));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getUsers()
    {
        $query = $this->db->prepare("SELECT * FROM users");
        $query->execute();
        $users=$query->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }

    function addUser($email,$password){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        
            $query = $this->db->prepare("INSERT INTO users(email,password) VALUES(?,?)");
            $query->execute(array($email,$hash));
        }

    function editUser($admin,$id)
    {
        $query = $this->db->prepare("UPDATE users SET admin=? WHERE id_user=?");
        $query->execute(array($admin,$id));
    }
}
