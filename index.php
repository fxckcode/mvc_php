<?php
require_once("controlador/PetsController.php");
require_once("controlador/UserController.php");

if (isset($_POST['login'])) {
    if (method_exists('UserController', $_POST['login'])) {
        UserController::{$_POST['login']}();
    }
}

if (isset($_GET['l'])) {
    if (method_exists('UserController', $_GET['l'])) {
        UserController::{$_GET['l']}();
    }
}

if (isset($_SESSION['email'])) {
    if (isset($_POST['f'])) {
        if (method_exists('PetsController', $_POST['f'])) {
            PetsController::{$_POST['f']}();
        }
    }

    if (isset($_GET['m'])) {
        if (method_exists('PetsController', $_GET['m'])) {
            PetsController::{$_GET['m']}();
        }
    }
} else {
    UserController::login();
}
