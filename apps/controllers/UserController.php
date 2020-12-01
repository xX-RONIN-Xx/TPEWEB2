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

    /*function verifyUser(){
        $user = $_POST["email"];
        $pass = $_POST["password"];
             var_dump($user, $pass);
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
    }*/

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
            $_SESSION['ADMINISTRADOR']=$user->admin;
                if ($_SESSION['ADMINISTRADOR'] == 1){
                    header("Location: ".BASE_URL."productos/admin");

                }else{
                    header("Location: ".BASE_URL."productos");
                }
            
        }else {
            $this->view->showLogin("Credenciales inválidas");
        }

    }

    function register(){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $users = $this->model->getUsers();
        var_dump($users, $email, $password);
        
        if ($email != '' && $password != ''){
            foreach($users as $user){
                if($email != $user->email){
                    $emailYaExiste = false;
                }else{
                    $emailYaExiste = true;
                    var_dump($emailYaExiste);
                    
                    $this->view->showRegistro('el email ingresado ya existe');
                }
            }
            if($emailYaExiste == false){
                $this->model->addUser($email,$password);
                session_start();
                $_SESSION["email"] = $user->email;
                $_SESSION["password"]= $user->password;
                $_SESSION['admin'] = 0;
                header("Location: " . BASE_URL);
            }
        }else{
            header("Location: " . registrarse);
        }
    }
    public function showRegistro(){
        $this->view->showRegistro();
    }


}
