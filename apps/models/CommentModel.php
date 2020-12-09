<?php

class CommentModel{
    private $db;
    
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_products;charset=utf8', 'root', '');
    }

   function getCommentsByProduct($idProduct){
        $query=$this->db->prepare('SELECT comments.*, users.email FROM comments INNER JOIN users
            ON users.id_user= comments.id_user WHERE id_product=?');
        $query->execute(array($idProduct));
        $comentarios = $query->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }


    function addCommentario($comment,$puntuacion,$id_user, $id_product){
        $query = $this->db->prepare("INSERT INTO comments(comment, puntuacion, id_user, id_product) VALUES(?,?,?,?)");
        $query->execute(array($comment,$puntuacion,$id_user, $id_product ));
        return $query->rowCount();
    }

    function getComment($id){
        $query = $this->db->prepare('SELECT comments.id_comment, comments.id_user, comments.id_product, comments.puntaje, 
            comments.comment, users.id_user, users.email, products.id_product, products.name FROM comments INNER JOIN users 
                ON comments.id_user = users.id_user INNER JOIN products ON products.id_product =comments.id_product 
                WHERE comments.id_product=?');
        $query->execute(array($id));
        $comment = $query->fetchAll(PDO::FETCH_OBJ);
        return $comment;
    }

    function deleteComment($id_comment){
        $query = $this->db->prepare("DELETE FROM comments WHERE id_comment=?");
        $query->execute(array($id_comment));
        return $query->rowCount();
    }
}
