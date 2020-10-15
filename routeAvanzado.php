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
    $r->addRoute("login", "GET", "UserController", "Login");
    $r->addRoute("logout", "GET", "UserController", "Logout");
    $r->addRoute("verify", "POST", "UserController", "VerifyUser");
    $r->addRoute("productos/:ID", "GET", "ProductController", "showProductsByCategory");

    //Ruta por defecto.
    $r->setDefaultRoute("ProductController", "Home");
    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>
