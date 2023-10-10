<?php

require_once("modelo/index.php");
session_start();
class PetsController {
    private $modelo;

    public function __construct()
    {
        $this->modelo = new Modelo();
    }

    static function index()
    {
        $modelo = new Modelo();
        $mascota = $modelo->mostrarPersonalizado("SELECT p.id, p.nombre, r.name as raza, p.photo FROM pets p JOIN races r ON p.race_id = r.id");
        require_once("vista/dashboard.php");
    }

    static function nuevo()
    {
        $_raza = new Modelo();
        $_categoria = new Modelo();
        $_genero = new Modelo();
        $raza = $_raza->mostrar("races", "1");
        $categoria = $_categoria->mostrar("categories", "1");
        $genero = $_genero->mostrar("genders", "1");
        require_once("vista/add.php");
    }

    static function guardar() {
        $nombre = $_POST['nombre'];
        $race_id = $_POST['race_id'];
        $category_id = $_POST['category_id'];
        $photoName = $_FILES['photo']['name'];
        $photoTmp = $_FILES['photo']['tmp_name'];
        move_uploaded_file($photoTmp, "vista/imgs/".$photoName);
        $gender_id = $_POST['gender_id'];
        $modelo = new Modelo();
        $modelo->insertar("INSERT INTO pets(nombre, race_id, category_id, photo, gender_id) VALUE ('".$nombre."', ".$race_id.", ".$category_id.", '".$photoName."', ".$gender_id.");");
        header("location: index.php");
    }

    static function show() {
        $id = $_GET['id'];
        $modelo = new Modelo();
        $mascota = $modelo->mostrarPersonalizado("SELECT p.id, p.nombre, r.name as raza, c.name as categoria, p.photo, g.name as genero 
                                                      FROM pets p
                                                      JOIN races r ON p.race_id = r.id
                                                      JOIN categories c ON p.category_id = c.id
                                                      JOIN genders g ON p.gender_id = g.id
                                                      WHERE p.id=".$id);
        require_once("vista/show.php");
    }

    static function editar()
    {
        $id = $_GET['id'];
        $_raza = new Modelo();
        $_categoria = new Modelo();
        $_genero = new Modelo();
        $raza = $_raza->mostrar("races", "1");
        $categoria = $_categoria->mostrar("categories", "1");
        $genero = $_genero->mostrar("genders", "1");
        $modelo = new Modelo();
        $mascota = $modelo->mostrar("pets", "1");
        require_once("vista/edit.php");
    }

    static function actualizar()
    {
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $race_id = $_POST['race_id'];
        $category_id = $_POST['category_id'];
        if ($_FILES['photo']['name']) {
            $photoName = $_FILES['photo']['name'];
            $photoTmp = $_FILES['photo']['tmp_name'];
            move_uploaded_file($photoTmp, "vista/imgs/".$photoName);
        } else {
            $modelo = new Modelo();
            $mascota = $modelo->mostrar("pets", "id=".$id);
            foreach ($mascota as $v) {
                $photoName = $mascota['photo'];
            }
        }
        $gender_id = $_POST['gender_id'];

        $actualizar = new Modelo();
        $actualizar->actualizar("pets", "nombre='".$nombre."', race_id=".$race_id.", category_id=".$category_id.", photo='".$photoName."', gender_id=".$gender_id, "id=".$id);
        header("location: index.php");
    }
    static function eliminar()
    {
        $id = $_GET['id'];
        $modelo = new Modelo();
        $modelo->eliminar("pets", "id=".$id);
        header("location: index.php");
    }
}