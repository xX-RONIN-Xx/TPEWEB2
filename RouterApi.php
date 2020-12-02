<?php
require_once 'RouterClass.php';
require_once 'apps/controllers/ApiCommentController.php';

$router = new Router();

// RUTEO API REST
$router->addRoute('comentarios/:ID', 'GET', 'ApiCommentController', 'showComments');
$router->addRoute('comentarios/:ID', 'GET', 'ApiCommentController', 'showComment');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiCommentController', 'deleteComment');
//$router->addRoute('comentarios', 'POST', 'ApiCommentController', 'addComment');

// $router->addRoute('peliculas', 'POST', 'ApiComentController', 'insertMovie');
// $router->addRoute('peliculas/:ID', 'PUT', 'ApiComentController', 'updateMovie');

//run
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 