<?php
require_once './apps/models/CommentModel.php';
require_once './apps/views/ApiView.php';
//require_once 'ApiController.php';

class ApiCommentController {

  
    private $model;
    private $view;
    private $data;

    public function __construct() {
        $this->model = new CommentModel();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
    }

    function getData(){
        return json_decode($this->data);
    }



    function showComment($params = null){
        $id = $params[':ID'];
        $comment = $this->model->getComment($id);
        if (!empty($comment)){
            $this->view->response($comment, 200);
        }
        else {
            $this->view->response("El comentario no existe", 404);
        }
    }

    function getAll(){
       $comments= $this->model->getComments();
       var_dump($comments);
       die();
    }

    function showComments($params = null) {
        $id_producto = $params[':ID'];
        $comentarios = $this->model->getComments($id_producto);
        if (!empty($comentarios)) {
            $this->view->response($comentarios, 200);
        }
        else {
            $this->view->response("No se encontraron comentarios", 404);
        }

        var_dump($comments);
        die();
    }


}
