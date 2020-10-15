<?php
require_once('libs/smarty/Smarty.class.php');

class ProductView{
    private $smarty;
    function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('title', "Productos");
    }

    function viewHome(){
        $this->smarty->display('templates/home.tpl');
    }

//Productos////////

    function showProduct($product){
        $this->smarty->assign('product', $product);
        $this->smarty->display('templates/productdetail.tpl');
    }

    function showProductsView($products, $categories){
        $this->smarty->assign('products', $products);
        $this->smarty->assign('categorias', $categories);
        $this->smarty->display('templates/products.tpl');
    }

    function showCategory($products, $categories){
        $this->smarty->assign('products', $products);
        $this->smarty->assign('categorias', $categories);
        $this->smarty->display('templates/products.tpl');
    }
    function showEditProduct($product,$categories){
        $this->smarty->assign('products', $product);
        $this->smarty->assign('Seleccionar', $product->name_caegory);
        $this->smarty->assign('categorias', $categories);
        $this->smarty->display('templates/editProduct.tpl');

    }

    function showUpdateProduct($products, $categories){

        $this->smarty->assign('products', $products);
        $this->smarty->assign('categorias', $categories);
        $this->smarty->display('templates/products.tpl'); 

    }


    
}
