<?php
require_once './apps/models/CommentModel.php';
require_once './apps/views/ApiView.php';

class ApiCommentController
{
    private $model;
    private $view;
    private $data;

    public function __construct()
    {
        $this->model = new CommentModel();
        $this->view = new APIView();
        $this->data =  file_get_contents("php://input");
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
        if ($this->controller->isLogged() && $_SESSION["ADMINISTRADOR"] == 1) {
            $id = $params[':ID'];
            $result = $this->model->deleteComment($id);
            if ($result > 0) {
                $this->view->response("El comentario con id=$id fue eliminado", 200);
            } else {
                $this->view->response("El comentario con id=$id no existe", 404);
            }
        }
    }
}
