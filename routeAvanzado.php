<?php
    require_once 'RouterClass.php';
    require_once 'apps/controllers/ProductController.php';
    require_once 'apps/controllers/UserController.php';
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');
   
    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "ProductController", "Home");
    $r->addRoute("productos", "GET", "ProductController", "showAllProducts");
    $r->addRoute("filtrar/:ID", "GET", "ProductController", "showProductsByCategory");
    $r->addRoute("detail/:ID", "GET", "ProductController", "showDetailProduct");
    
    // acceso
    $r->addRoute("login", "GET", "UserController", "Login");
    $r->addRoute("logout", "GET", "UserController", "Logout");
    $r->addRoute("verify", "POST", "UserController", "loginUser");

    ///////
    //Productos ABM
    $r->addRoute("insert", "POST", "ProductController", "InsertProduct");
    $r->addRoute("delete/:ID", "GET", "ProductController", "DeleteProduct");
    $r->addRoute("editar/:ID", "GET", "ProductController", "EditProduct");
    $r->addRoute("update", "POST", "ProductController", "UpdateProduct");

    //Categorias ABM
    $r->addRoute("insertCategory", "POST", "ProductController", "InsertCategory");
    $r->addRoute("deleteCategory/:ID", "GET", "ProductController", "DeleteCategory");
    $r->addRoute("editCategory/:ID", "GET", "ProductController", "editCategory");
    $r->addRoute("editCategory/updateCategory", "POST", "ProductController", "UpdateCategory");

    //registro
    $r->addRoute("registrarse","GET","UserController","showRegistro");
    $r->addRoute("register","POST","UserController","register");

    //admin
    $r->addRoute("deleteUser/:ID", "GET", "UserController", "deleteUser");
    $r->addRoute("usuarios", "GET", "UserController", "getUsers");
    $r->addRoute("adminUsers", "POST", "UserController", "CambiarPermisos");
    //$r->addRoute("administrador", "POST", "LoginController", "AgregarAdmin");


    //Ruta por defecto.
    $r->setDefaultRoute("ProductController", "showAllProducts");
    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>
