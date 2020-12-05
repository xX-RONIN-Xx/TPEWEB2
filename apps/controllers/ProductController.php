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

    /*private function checkLoggin()
    {
        session_start();
        if (!isset($_SESSION["user"])) {
            header("Location:" . LOGIN);
            die();
        }
    }
    private function checkLogginAdmin()
    {
        session_start();
        if (!isset($_SESSION["admin"])) {
            header("Location:" . LOGIN);
            die();
        }
    }*/

    function Home()
    {
        session_start();
            $this->view->viewHome();
    }
    //////Productos
    function EditProduct($params = null)
    {
        //$this->checkLogginAdmin();
        $id = $params[':ID'];
        $product = $this->model->getProduct($id);
        $categorias = $this->model->getCategories();
        $this->view->showEditProduct($categorias, $product);
    }



    ////////////////////////////////////////////////

    function UpdateProduct($params = null)
    {
        //$this->checkLogginAdmin();
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $category = $_POST['id_category'];
        $id = $_POST['id'];
        $this->model->EditProduct($name, $description, $price, $stock, $category, $id);

        header("Location: " . BASE_URL . "productos");
    }

        function showAllProducts()
        {
            session_start();
            $accesoAdmin = 0;
            if (isset($_SESSION) && $_SESSION != null) {
                $accesoAdmin = $_SESSION['ADMINISTRADOR'];
            }
            $products = $this->model->getProducts();
            $categories = $this->model->getCategories();
            $this->view->showProductsView($products, $categories, $accesoAdmin);
        }

    /*function showAdminProducts()
    {

        $products = $this->model->getProducts();
        $categories = $this->model->getCategories();
        $this->view->showProductsAdmin($products, $categories);
    }
*/
    function showDetailProduct($params = null)
    {

        if (isset($params[':ID'])) {
            session_start();
            $id_product = $params[':ID'];
            $product = $this->model->getProduct($id_product);
            $this->view->showProduct($product);
        }
    }


    function showProductsByCategory($params = null)
    {

        if (isset($params[':ID'])) {
            $accesoAdmin = 0;
            session_start();
            if (isset($_SESSION) && $_SESSION != null) {
                $accesoAdmin = $_SESSION['ADMINISTRADOR'];
            }

            if ($params[':ID'] == 'Todos') {
                $products = $this->model->getProducts();
                $categories = $this->model->getCategories();
                $this->view->showProductsView($products, $categories, $accesoAdmin);
            } else {
                $categoryID = $params[':ID'];
                $products = $this->model->getProductsByCategory($categoryID);
                $categories = $this->model->getCategories();
                $this->view->showProductsView($products, $categories, $accesoAdmin);
            }
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

    function UpdateCategory()
    {
        $id = $_POST['id_cat'];
        $name = $_POST['name_cat'];
        $categoriesSaved = $this->model->getAllCategories();
        foreach (($categoriesSaved) as $cat) {

            if (strtoupper($cat) == strtoupper($name)) {
                $this->view->showError("la categoria ya existe");
                return;
            }
        }
        $this->model->editCategorybyId($name, $id);
        header("Location: " . BASE_URL . "productos");
    }

    function editCategory($params = null)
    {
        $id = $params[':ID'];
        $nameCategoryEdit = $this->model->getCategoryAll($id);
        $this->view->showUpdateCategory($nameCategoryEdit);
    }
}
