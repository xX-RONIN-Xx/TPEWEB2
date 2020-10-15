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

    function showAllProducts()
    {

        $products = $this->model->getProducts();
        $categories = $this->model->getCategories();
        $this->view->showProductsByCategoryView($products, $categories);
    }

    function showProductsByCategory($params = null)
    {
        //var_dump($params);
        var_dump($params[':ID']);
        if (isset($params[':ID'])) {

            $categoryID = $params[':ID'];
            $products = $this->model->getProductsByCategory($categoryID);
            $categories = $this->model->getCategories();
            $this->view->showProductsByCategoryView($products, $categories);
        }
    }
}
