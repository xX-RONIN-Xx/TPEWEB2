<?php
require_once "./apps/views/UserView.php";
require_once "./apps/views/ProductView.php";
require_once "./apps/models/UserModel.php";

class UserController
{
    private $view;
    private $model;
    function __construct()
    {
        $this->view = new UserView();
        $this->viewProduct = new ProductView();
        $this->model = new UserModel();
    }

    function Login($error=null)
    {
        $this->view->showLogin($error=null);
    }

    function Logout()
    {
        session_start();
        session_destroy();
        header("Location: " . LOGIN);
    }

    function isLogged()
    {
        $isLogged = false;
        session_start();
        if (isset($_SESSION['EMAIL'])) {
            $isLogged = true;
        }
        return $isLogged;
    }
function loginUser(){
    $user = $_POST["email"];
    $pass = $_POST["password"];
    if(isset($user)){
    $userFromDB = $this->model->getUser($user);
    if(isset($userFromDB) && $user){
        $hash=$userFromDB->password;
        if(password_verify($pass, $hash)){
            session_start();
            $_SESSION['EMAIL'] = $userFromDB->email;
            $_SESSION["ID_USER"] = $userFromDB->id_user;
            $_SESSION["ADMINISTRADOR"] = $userFromDB->admin;
            header("Location: " . BASE_URL);
        }
        else{
            $this->view->ShowLogin("Contraseña incorrecta");
            }
        }
        else{
        // No existe el user en la DB
        $this->view->ShowLogin("El usuario no existe");
        }
    }
}
   
    function register()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        if (!empty($email) && !empty($password)) {
            $users = $this->model->getUsers();
           
            foreach ($users as $user) {
                if ($email != $user->email) {
                    $emailYaExiste = false;             
                } else {
                    $emailYaExiste = true;
                    $this->view->showReg("el email ingresado ya existe");
                    die();
                }
            }
            if ($emailYaExiste == false) {
                $this->model->addUser($email, $password);
                $user = $this->model->getUser($email);
                session_start();
                $_SESSION["ID_USER"] = $user->id_user;
                $_SESSION["EMAIL"] = $user->email;
                $_SESSION["PASSWORD"] = $user->password;
                $_SESSION["ADMINISTRADOR"] = 0;
                header("Location: " . BASE_URL);
            }
        } else {
            $this->view->showReg("Faltan datos obligatorios");
            }
    }

    public function showRegistro()
    {
        $this->view->showReg();
    }


    function getUsers()
    {
        session_start();
        $users = $this->model->getUsers();
        $this->view->showUsers($users);
    }

    function CambiarPermisos()
    {
        if ($this->isLogged() && $_SESSION['ADMINISTRADOR'] == 1) {
            if (!empty($_POST['admin'])) {
                $siAdmin = $_POST['admin'];
                $id_usuario = $_POST['idUser'];
            } else {
                $siAdmin = 0;
                $id_usuario = $_POST['idUser'];
            }

            $this->model->editUser($siAdmin, $id_usuario);
            header("Location: " . "usuarios");
        }
    }

    function deleteUser($params = null)
    {
        if (isset($params[":ID"])) {
            $id = $params[':ID'];
            $this->model->deleteUser($id);
            header("Location: " . BASE_URL . "usuarios");
        }
    }
}
