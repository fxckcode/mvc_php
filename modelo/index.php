<?php

class Modelo {
    private $db;
    private $Modelo;

    public function __construct()
    {
        $this->Modelo = array();
        $this->db = new PDO("mysql:host=localhost;dbname=petfinder", "root", "");
    }

    public function mostrar($tabla, $condicion)
    {
       $resultado = $this->db->query("SELECT * FROM ".$tabla." WHERE ".$condicion);
       return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function mostrarPersonalizado($sql)
    {
        $resultado = $this->db->query($sql);
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($sql)
    {
        $resultado = $this->db->query($sql);
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizar($tabla, $data, $condicion)
    {
        $resultado = $this->db->query("UPDATE ".$tabla." SET ".$data." WHERE ".$condicion);
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminar($tabla, $condicion)
    {
        $resultado = $this->db->query("DELETE FROM ".$tabla." WHERE ".$condicion);
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function validar($email, $password)
    {
        $pass = md5(strval($password));
        $resultado = $this->db->query("SELECT * FROM users WHERE email='".$email."' AND password='".$pass."'");
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
}