<?php

require_once("modelo/index.php");

class UserController {
    private $modelo;

    public function  __construct()
    {
        $this->modelo = new Modelo();
    }

    static function login()
    {
        require_once("vista/login.php");
    }

    static function autenticar()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $modelo = new Modelo();
        $validar = $modelo->validar($email, $password);
        if ($validar) {
            session_start();
            $_SESSION['email'] = $email;
            header("location: index.php?m=index");
        } else {
            header("location: index.php?m=index");
        }
    }

    static function logout()
    {
        session_abort();
        header("location: index.php?l=login");
    }
}