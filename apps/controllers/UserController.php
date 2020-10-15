<?php

require_once "./apps/views/UserView.php";
require_once "./apps/models/UserModel.php";

class UserController{

    private $view;
    private $model;

    function __construct(){
        $this->view = new UserView();
        $this->model = new UserModel();
    }

    function Login(){
        $this->view->showLogin();
    }

    function Logout(){
        session_start();
        session_destroy();
        header("Location: ".LOGIN);
    }

    function verifyUser(){
        $user = $_POST["email"];
        $pass = $_POST["password"];
             var_dump($user);
        if(isset($user)){
            $userFromDB = $this->model->getUser($user);

            if(isset($userFromDB) && $userFromDB){
                // Existe el usuario

                if (password_verify($pass, $userFromDB->password)){

                    session_start();
                    $_SESSION["EMAIL"] = $userFromDB->email;
                    $_SESSION['LAST_ACTIVITY'] = time();

                    header("Location: ".BASE_URL."productos");
                }else{
                    $this->view->showLogin("Contraseña incorrecta");
                }

            }else{
                // No existe el user en la DB
                $this->view->showLogin("El usuario no existe");
            }
        }
    }

}
