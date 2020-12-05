<?php

class Categorymodel
{
    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_products;charset=utf8', 'root', '');
    }



function getCategoryInput($name)
    {
        //$query = $this->db->prepare("SELECT p.*, c.nombre as nombre_categoria FROM producto p INNER JOIN categoria c ON c.id = p.id_categoria WHERE c.nombre=?");
        $query = $this->db->prepare("SELECT * as nombre_categoria FROM producto p INNER JOIN categoria c ON c.id = p.id_categoria WHERE c.nombre=?");
        $query->execute(array($name));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getCategories()
    {
        $query = $this->db->prepare('SELECT * FROM categories');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getAllCategories()
    {
        $query = $this->db->prepare('SELECT name_caegory FROM categories');
        $query->execute(array());
        return $query->fetchAll(PDO::FETCH_COLUMN);
    }


    function addCategory($name_caegory)
    {
        var_dump($name_caegory);
        $query = $this->db->prepare("INSERT INTO `categories` ( `name_caegory`) VALUES (?);");

        $query->execute(array($name_caegory));
    }

    function removeCategory($id)
    {
        $query = $this->db->prepare("DELETE FROM categories WHERE id_category=?");
        $query->execute(array($id));
    }

    function editCategorybyId($name,$id)
    {

        //$query = $this->db->prepare("UPDATE `categories` SET name_caegory=? WHERE id_category=?");
        $query = $this->db->prepare("UPDATE categories SET name_caegory=? WHERE id_category=?");
        $query->execute(array($name,$id));
        
    }

    function getCategoryAll($id)
    {
        $query = $this->db->prepare("SELECT * FROM categories  WHERE id_category=?");
        $query->execute(array($id));
        return $query->fetch(PDO::FETCH_OBJ);
    }
}