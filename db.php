<?php

// Clase singleton para realizar la conexión a la base de datos con PostgreSQL
class DB {
    private static $instancia;
    private $conexion;

    private function __construct() {
        $host = 'localhost';
        $puerto = '5432';
        $nombreBD = 'postgres';
        $usuario = 'usuario';
        $contrasena = 'contraseña';

        try {
            $this->conexion = new PDO("pgsql:host=$host;port=$puerto;dbname=$nombreBD", $usuario, $contrasena);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("ERROR: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    public function __clone() {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }

    public function __destruct() {
        $this->conexion = null;
    }

    public function getConnection() {
        return $this->conexion;
    }
}