<?php
require_once './apps/models/CommentModel.php';
require_once './apps/views/ApiView.php';
//require_once '/apps/controllers/UserController.php';

class ApiCommentController
{
    private $model;
    private $view;
    private $data;
    //private $controller;
    public function __construct()
    {
        $this->model = new CommentModel();
        $this->view = new APIView();
        $this->data =  file_get_contents("php://input");
      //  $this->controller= new UserController();
    }

    function getData()
    {
        return json_decode($this->data);
    }

    public function showCommentsByProduct($params = null)
    {
        $id_product = $params[':ID'];
        $comments = $this->model->getCommentsByProduct($id_product);
        if (!empty($comments)) {
            $this->view->response($comments, 200);
        }
    }

    //el usuario administrador puede borrar un comentario
    public function deleteComment($params = null)
    {
        session_start();
        if ($_SESSION["ADMINISTRADOR"]) {
        
            $id = $params[':ID'];
            $result = $this->model->deleteComment($id);
            if ($result > 0) {
                $this->view->response("El comentario con id=$id fue eliminado", 200);
            } else {
                $this->view->response("El comentario con id=$id no existe", 404);
            }
        }
    }

    function addComment()
    {
        $body = $this->getData();
        $puntaje = $body->puntuacion;
        $idUser = $body->id_user;
        $idProduct = $body->id_product;
        $comentarios = $body->comment;

        $res = $this->model->addCommentario($comentarios, $puntaje, $idUser, $idProduct);
        $this->view->response(json_decode($this->data), 200);
    }
}
