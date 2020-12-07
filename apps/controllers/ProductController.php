<?php
require_once './apps/models/ProductModel.php';
require_once './apps/views/ProductView.php';
require_once './apps/models/CategoryModel.php';
require_once 'UserController.php';
class ProductController
{
    private $model;
    private $view;
    private $modelCat;
    private $controller;
    public function __construct()
    {
        $this->model = new ProductModel();
        $this->view = new ProductView();
        $this->modelCat = new CategoryModel();
        $this->controller = new UserController();
    }

    function Home()
    {
        session_start();
        $this->view->viewHome();
    }
    //////Productos
    function EditProduct($params = null)
    {
        if ($this->controller->isLogged() && $_SESSION['ADMINISTRADOR'] == 1) {

            $id = $params[':ID'];
            $product = $this->model->getProduct($id);

            $categorias = $this->modelCat->getCategories();
            $this->view->showEditProduct($categorias, $product);
        } else {
            header("Location: " . BASE_URL . "productos");
        }
    }

    function UpdateProduct($params = null)
    {
        if ($this->controller->isLogged() && $_SESSION['ADMINISTRADOR'] == 1) {
            if (($_POST['name']) != null && ($_POST['description']) != null && ($_POST['price']) != null && ($_POST['stock']) != null && ($_POST['id_category']) != null) {
                $name = $_POST['name'];
                $description = $_POST['description'];
                $price = intval($_POST['price']);
                $stock = intval($_POST['stock']);
                $category = intval($_POST['id_category']);
                $id = intval($_POST['id']);
                $this->model->EditProduct($name, $description, $price, $stock, $category, $id);
                header("Location: " . BASE_URL . "productos");
            } else {
                header("Location: " . BASE_URL . "productos");
            }
        }
    }
    //*********************Muestra los productos***********************//

    function showAllProducts()
    {
        session_start();
        $accesoAdmin = 0;
        if (isset($_SESSION) && $_SESSION != null) {
            $accesoAdmin = $_SESSION['ADMINISTRADOR'];
        }
        $products = $this->model->getProducts();
        $categories = $this->modelCat->getCategories();
        $this->view->showProductsView($products, $categories, $accesoAdmin);
    }


    //*********************Muestra un producto***********************//

    function showDetailProduct($params = null)
    {

        if (isset($params[':ID'])) {
            session_start();
            $user = $_SESSION['EMAIL'];
            if ($user) {
                $user = $_SESSION['EMAIL'];
            } else {
                $user = 0;
            }

            $id_product = $params[':ID'];
            $product = $this->model->getProduct($id_product);
            $this->view->showProduct($product, $user);
        }
    }

    //*********************Muestra los productos filtrando por categoria***********************//
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
                $categories = $this->modelCat->getCategories();
                $this->view->showProductsView($products, $categories, $accesoAdmin);
            } else {
                $categoryID = $params[':ID'];
                $products = $this->model->getProductsByCategory($categoryID);
                $categories = $this->modelCat->getCategories();
                $this->view->showProductsView($products, $categories, $accesoAdmin);
            }
        }
    }

    //*********************Agrega un producto***********************//
    function InsertProduct()
    {
        if ($this->controller->isLogged() && $_SESSION['ADMINISTRADOR'] == 1) {
            if (($_POST['name']) != null && ($_POST['description']) != null && ($_POST['price']) != null && ($_POST['stock']) != null && ($_POST['id_category']) != null) {
                $name = $_POST['name'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $stock = $_POST['stock'];
                $category = $_POST['id_category'];
                $this->model->addProduct($name, $description, $price, $stock, $category);
                header("Location: " . BASE_URL . "productos");
            } else {
                header("Location: " . BASE_URL . "login");
            }
        }
    }

    //*********************Borra un producto***********************//

    function DeleteProduct($params = null)
    {
        if ($this->controller->isLogged() && $_SESSION['ADMINISTRADOR'] == 1) {

            $id = $params[':ID'];
            $this->model->removeProduct($id);
            header("Location: " . BASE_URL . "productos");
        }
    }



    ////////////////////Categorías //////////////////////////
    //************************Inserta una categoria nueva****************** */
    function InsertCategory()
    {
        if ($this->controller->isLogged() && $_SESSION['ADMINISTRADOR'] == 1) {
            if (($_POST['name']) != null) {

                $category = $_POST['name_caegory'];
                $this->modelCat->addCategory($category);
                header("Location: " . BASE_URL . "productos");
            } else {
                header("Location: " . BASE_URL . "login");
            }
        }
    }

    //************************Borra una categoria****************** */
    function DeleteCategory($params = null)
    {
        if ($this->controller->isLogged() && $_SESSION['ADMINISTRADOR'] == 1) {
            $id = $params[':ID'];
            $this->modelCat->removeCategory($id);
            header("Location: " . BASE_URL . "productos");
        }
    }

    //************************Edita una categoria****************** */

    function editCategory($params = null)
    {
        if ($this->controller->isLogged() && $_SESSION['ADMINISTRADOR'] == 1) {
            $id = $params[':ID'];
            $nameCategoryEdit = $this->modelCat->getCategoryAll($id);

            $this->view->showUpdateCategory($nameCategoryEdit);
        }
    }

    function UpdateCategory()
    {
        if ($this->controller->isLogged() && $_SESSION['ADMINISTRADOR'] == 1) {
            if (($_POST['name']) != null) {
                $id = $_POST['id_cat'];
                $name = $_POST['name_cat'];

                $categoriesSaved = $this->modelCat->getAllCategories();
                foreach (($categoriesSaved) as $cat) {

                    if (strtoupper($cat) == strtoupper($name)) {
                        $this->view->showError("la categoria ya existe");
                        return;
                    }
                }
                $this->modelCat->editCategorybyId($name, $id);
                header("Location: " . BASE_URL . "productos");
            } else {
                header("Location: " . BASE_URL . "login");
            }
        }
    }
}
