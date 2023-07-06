<?php

class Conexxion {
    private $host = "localhost";
    private $nombreBD = "mysbd_proyectmanejo";
    private $usuario = "root";
    private $contrasena = "";
    private $cn;

    public function conectar(){
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->nombreBD};charset=utf8";
            $opciones = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            );

            $this->cn = new PDO($dsn, $this->usuario, $this->contrasena, $opciones);
        } catch (PDOException $e) {
            echo "Error de conexión a la BD: " . $e->getMessage();
        }
    }
    public function getCn(){
        return $this->cn;
    }
}
