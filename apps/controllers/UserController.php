<?php

require_once "./apps/views/UserView.php";
require_once "./apps/views/ProductView.php";
require_once "./apps/models/UserModel.php";

class UserController{

    private $view;
    private $viewProduct;
    private $model;

    function __construct(){
        $this->view = new UserView();
        $this->viewProduct =new ProductView();
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

    

    public function loginUser() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // verifico campos obligatorios
        if (empty($email) || empty($password)) {
            $this->Login("Faltan datos obligatorios");
            die();
        }

        // obtengo el usuario
        $user = $this->model->getUser($email);

        // si el usuario existe, y las contraseñas coinciden
        if ($user && password_verify($password, $user->password)) {
            
            session_start();
            $_SESSION["EMAIL"] = $user->email;
            $_SESSION["PASS"]= $user->password;
            $_SESSION["ADMINISTRADOR"]=$user->admin;
            header("Location: ".BASE_URL."productos");
            
        }else {
            $this->view->showLogin("Credenciales inválidas");
        }

    }

    function register(){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $users = $this->model->getUsers();
        
        if ($email != '' && $password != ''){
            foreach($users as $user){
                if($email != $user->email){
                    $emailYaExiste = false;
                }else{
                    $emailYaExiste = true;
                    //var_dump($emailYaExiste);
                    $this->view->showRegistro('el email ingresado ya existe');
                    die();
                }
            }
            if($emailYaExiste == false){
                $this->model->addUser($email,$password);
                session_start();
                $_SESSION["EMAIL"] = $user->email;
                $_SESSION["PASSWORD"]= $user->password;
                $_SESSION["ADMINISTRADOR"] = 0;
                header("Location: " . BASE_URL);
            }
        }else{
            header("Location: " . "registrarse");
        }
    }
    public function showRegistro(){
        $this->view->showRegistro();
    }


    function getUsers(){
        session_start();
        $users=$this->model->getUsers();
        $this->view->showUsers($users);
    }

    function CambiarPermisos(){

            if(!empty($_POST['admin'])){
            
                $siAdmin=$_POST['admin'];
                $id_usuario=$_POST['idUser'];
            }else{
                $siAdmin=0;
                $id_usuario=$_POST['idUser'];
            }
            var_dump($siAdmin,$id_usuario);
        
            $this->model->editUser($siAdmin,$id_usuario);

        header("Location: " . "usuarios");
        
    }
}
