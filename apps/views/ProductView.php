<?php
require_once('libs/smarty/Smarty.class.php');

class ProductView
{
    private $smarty;
    function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('title', "Productos");
    }
    function viewProducts($products)
    {
        $this->smarty->assign('products', $products);
        $this->smarty->display('templates/products.tpl');
    }

    function showProductsByCategoryView($products, $categories)
    {
        $this->smarty->assign('products', $products);
        $this->smarty->assign('categorias', $categories);
        $this->smarty->display('templates/products.tpl');
    }

    function viewHome()
    {
        $this->smarty->display('templates/home.tpl');
    }
}
