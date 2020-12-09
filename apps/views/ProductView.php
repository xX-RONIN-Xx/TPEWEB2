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

    function showProduct($product,$user,$admin){
        $this->smarty->assign('product', $product);
        $this->smarty->assign('user',$user);
        $this->smarty->assign('admin',$admin);
        $this->smarty->display('templates/productdetail.tpl');
    }

    function showProductsView($products, $categories,$accesoAdmin){
        $this->smarty->assign('products', $products);
        $this->smarty->assign('categorias', $categories);
        $this->smarty->assign('admin', $accesoAdmin);
        $this->smarty->display('templates/products.tpl');
    }

    function showCategory($products, $categories){
        $this->smarty->assign('products', $products);
        $this->smarty->assign('categorias', $categories);
        $this->smarty->display('templates/products.tpl');
    }
    function showEditProduct($categories,$product){
        $this->smarty->assign('product', $product);
        $this->smarty->assign('Seleccionar', $product->name_caegory);
        $this->smarty->assign('categorias', $categories);
        $this->smarty->display('templates/editProduct.tpl');

    }

    function showProductsAdmin($products, $categories){

        $this->smarty->assign('products', $products);
        $this->smarty->assign('categorias', $categories);
        $this->smarty->display('templates/productsAdmin.tpl'); 

    }

//categoria////////
    function showUpdateCategory($nameCategoryEdit){
        //$this->smarty->assign('products', $products);
        $this->smarty->assign('categoriaEdit', $nameCategoryEdit);
        //$this->smarty->assign('categorias', $categories);
        $this->smarty->display('templates/categorias.tpl');

    }
    function showError($error_e){
        $this->smarty->assign('error',$error_e);
        $this->smarty->assign('Back','productos');
        $this->smarty->display('templates/error.tpl');
    }


}
