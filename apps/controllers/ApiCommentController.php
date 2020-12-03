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

    function addComment(){
        //aca verificar si esta logueado y los parametros
       /* $datos=explode("&",$this->data);
        var_dump($datos);
        die();*/
        session_start();
        $idUser=$_SESSION["ID_USER"];

        //$idProduct=$_POST['product_id'];
        $body = $this->getData();   
       /*var_dump($body,$this->data);
        die();*/
        
       /* $idProduct=$body->id_product;
        $puntaje=$body->puntaje;
        $comentarios=$body->comentarios;*/
        echo "entro a la funcion";
        $idProduct=2;
        $puntaje=5;
        $comentarios="harcodeado";
       
       $res=$this->model-> addComment($idUser, $idProduct, $puntaje, $comentarios);
    }


   /* function showComment($params = null){
        $id = $params[':ID'];
        $comment = $this->model->getComment($id);
        if (!empty($comment)){
            $this->view->response($comment, 200);
        }
        else {
            $this->view->response("El comentario no existe", 404);
        }
    }*/

   /* function getAll($params=null){
       $comments= $this->model->getComments($params);
       var_dump($comments);
       die();
    }*/

    function showComments($params = null) {
        $id_producto = $params[':ID'];
        //verificar si el prod existe
        $comentarios = $this->model->getComments($id_producto);
      
            $this->view->response($comentarios, 200);
        }


}
