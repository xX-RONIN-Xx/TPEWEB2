<?php

class Productmodel
{
    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_products;charset=utf8', 'root', '');
    }

    //Products
    /////////////////////////// 

    function getProducts()
    {
        $query = $this->db->prepare('SELECT * FROM products JOIN categories ON products.id_category = categories.id_category');
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }


    function getProductsCount()
    {
        $query = $this->db->prepare('SELECT * FROM products JOIN categories ON products.id_category = categories.id_category');
        $query->execute();
        $query->fetchAll(PDO::FETCH_OBJ);
        return $query->rowCount();
    }

    function getProduct($id_producto)
    {
        $query = $this->db->prepare('SELECT * FROM products JOIN categories ON categories.id_category = products.id_category and products.id_product=?');
        $query->execute(array($id_producto));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getProductsByCategory($category)
    {

        $query = $this->db->prepare('SELECT name, description, id_product, name_caegory FROM products JOIN categories ON categories.id_category = products.id_category and products.id_category=?');
        $query->execute(array($category));
        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }


    function addProduct($name, $description, $precio, $stock, $categoria)
    {
        $query = $this->db->prepare('INSERT INTO products(name, description, price, stock, id_category) VALUES(?,?,?,?,?)');
        $query->execute(array($name, $description, $precio, $stock, $categoria));
    }
    function removeProduct($id)
    {
        $query = $this->db->prepare("DELETE FROM products WHERE id_product=?");
        $query->execute(array($id));
    }

    function getProductEdit($id_producto)
    {

        $query = $this->db->prepare("SELECT * FROM products WHERE id_product=?");
        $query->execute(array($id_producto));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function EditProduct($name, $description, $price, $stock, $id_category,$id_product)
    {

        $query = $this->db->prepare('UPDATE products SET name=?, description=?, price=?, stock=?, id_category=? WHERE id_product=?');
        $query->execute(array($name, $description, $price, $stock, $id_category, $id_product));

    }

}
