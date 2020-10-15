<?php

class Productmodel
{
    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_products;charset=utf8', 'root', '');
    }

    function getCategories()
    {
        $query = $this->db->prepare('SELECT * FROM categories');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getProducts()
    {
        $query = $this->db->prepare('SELECT * FROM products JOIN categories ON products.id_category = categories.id_category');
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    function getProductsByCategory($category)
    {

        $query = $this->db->prepare('SELECT name, description, name_caegory FROM products JOIN categories ON categories.id_category = products.id_category and products.id_category=?');
        $query->execute(array($category));
        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }

    function getProductsByCategories($category)
    {

        $query = $this->db->prepare('SELECT * FROM products WHERE category = ?');
        $query->execute(array($category));
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }
}
