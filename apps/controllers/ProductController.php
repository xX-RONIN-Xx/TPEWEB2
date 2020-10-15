<?php
require_once './apps/models/ProductModel.php';
require_once './apps/views/ProductView.php';

class ProductController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new ProductModel();
        $this->view = new ProductView();
    }

    function Home()
    {
        $this->view->viewHome();
    }

    //////Productos
    function EditProduct($params=null){
        $id=$params[':ID'];
        $product = $this->model->getProduct($id);
        $categorias = $this->model->getCategories();
        $this->view->showEditProduct($product,$categorias);
    }

    function UpdateProduct($params = null){

        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $category = $_POST['id_category'];
        $id = $params[':ID'];
        $this->model->EditProduct($name, $description, $price, $stock, $category, $id);
        $products= $this->model->getProducts();
        $categories= $this->model->getCategories();
        //header ("Location: " . BASE_URL . "productos");
        $this->view->showProductsView($products, $categories);
    }

    function showAllProducts()
    {

        $products = $this->model->getProducts();
        $categories = $this->model->getCategories();
        $this->view->showProductsView($products, $categories);
    }

    function showDetailProduct($params = null)
    {

        if (isset($params[':ID'])) {

            $id_product = $params[':ID'];
            $product = $this->model->getProduct($id_product);
            $this->view->showProduct($product);
        }
    }


    function showProductsByCategory($params = null)
    {
        //var_dump($params);
        var_dump($params[':ID']);
        if (isset($params[':ID'])) {

            $categoryID = $params[':ID'];
            $products = $this->model->getProductsByCategory($categoryID);
            $categories = $this->model->getCategories();
            $this->view->showProductsView($products, $categories);
        }
    }

    function InsertProduct()
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $category = $_POST['id_category'];
        $this->model->addProduct($name, $description, $price, $stock, $category);
        header("Location: " . BASE_URL . "productos");
    }

    function DeleteProduct($params = null)
    {
        $id = $params[':ID'];
        $this->model->removeProduct($id);
        header("Location: " . BASE_URL . "productos");
    }

   

    //Categorías
    //////////////////////////
    /*function showACategories(){

        $categories = $this->model->getCategories();
        $this->view->showProductsByCategoryView($categories);
    }*/

    function InsertCategory()
    {

        $category = $_POST['name_caegory'];
        $this->model->addCategory($category);
        header("Location: " . BASE_URL . "productos");
    }

    function DeleteCategory($params = null)
    {
        $id = $params[':ID'];
        $this->model->removeCategory($id);
        header("Location: " . BASE_URL . "productos");
    }

    /*function UpdateCategory($params = null)
    {
        $id = $params[':ID'];
        $category = $this->model->editCategory($id);
        header("Location: " . BASE_URL . "productos");
    }

    function editCategory()
    {
        $categoria = $_POST['name_caegory'];

        /*if (empty($categoria)) {
            $this->view->showError('Por favor, complete el nombre de la categoría');
            die();
        }
        $this->model->EditCategory($categoria);
        header("Location: " . BASE_URL . "productos");
    }*/
    
}
