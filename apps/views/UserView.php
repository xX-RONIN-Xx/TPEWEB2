<?php
require_once('libs/smarty/Smarty.class.php');

class UserView
{

    private $smarty;


    function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('title', "Login");
    }

    function showLogin($error = null)
    {

        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/login.tpl');
    }

    function showRegistro($error = null)
    {

        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/register.tpl');
    }

    function showUsers($users=null){
        $this->smarty->assign('users',$users);
        $this->smarty->display('templates/users.tpl');
    }

}
