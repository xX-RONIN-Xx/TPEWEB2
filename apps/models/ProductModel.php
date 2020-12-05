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

    function getProduct($id_producto)
    {
        //$query = $this->db->prepare('SELECT name, description, price, stock, name_caegory FROM products JOIN categories ON categories.id_category = products.id_category and products.id_product=?');
        $query = $this->db->prepare('SELECT * FROM products JOIN categories ON categories.id_category = products.id_category and products.id_product=?');
        $query->execute(array($id_producto));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getProductsByCategory($category)
    {

        $query = $this->db->prepare('SELECT name, description, name_caegory FROM products JOIN categories ON categories.id_category = products.id_category and products.id_category=?');
        $query->execute(array($category));
        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }

   /* function getProductsByCategories($category)
    {

        $query = $this->db->prepare('SELECT * FROM products WHERE id_category = ?');
        $query->execute(array($category));
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }*/

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

    function EditProduct($name, $description, $price, $stock, $category, $id)
    {
        $query = $this->db->prepare('UPDATE products SET  name=?, description=?, price=?, stock=?, id_category=? WHERE id_product=?');
        //$query = $this->db->prepare("UPDATE `products` SET `name`=?, `description`=?, `price`=?, `stock`=?, `id_category`=? WHERE `id_product`=?");
        $query->execute(array($name, $description, $price, $stock, $category, $id));
    }

    //Categories   
    /////////////////////////////////////


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
